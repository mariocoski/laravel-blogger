<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\ContactFormNotification;
use App\Notifications\SubscriptionNotification;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function autocomplete()
    {
        $response = [];

        $articles = Article::search(request('query'))->get();

        $response['results'] = $articles->map(function ($item) {
            if (!empty($item->article_image)) {
                $articleImage = config('app.url') . "/" . config('blogger.filemanager.upload_path') . "/" . $item->article_image;
            } else {
                $articleImage = config('app.url') . "/images/placeholder_640x480.png";
            }

            return [
                "title" => $item->title,
                'url' => '/blog/' . $item->slug,
                'image' => $articleImage,
            ];
        });

        if ($articles->count() > 4) {
            $response['action'] = ["url" => config('app.url') . "/search?query=" . request('query'), "text" => "View all articles"];
        }

        return response()->json($response);
    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255|email',
        ]);
        $subscritionExists = Subscription::findByEmail(request('email'));

        if ($subscritionExists) {
            return response()->json(['success' => false, 'error' => 'This email already exists in our database']);
        }

        $subscription = Subscription::create([
            'email' => request('email'),
            'ip_address' => request()->ip(),
        ]);

        $subscription->notify(new SubscriptionNotification($request));

        return response()->json(['success' => true]);

    }

    public function subscriptionConfirm($email = null)
    {
        $success = false;

        $subscription = Subscription::findByEmail($email);
        if ($subscription) {
            $subscription->update(['is_confirmed' => true]);
            $success = true;
        }
        return view('frontend.subscription_confirmation', compact('success'));

    }

    public function sitemap()
    {
        return view('frontend.sitemap');
    }

    public function termsAndConditions()
    {
        return view('frontend.terms_and_conditions');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }

    public function about()
    {
        $authors = User::all()->filter(function ($user) {
            return $user->hasRole('editor');
        });
        return view('frontend.about', compact('authors'));
    }

    public function author($slug)
    {
        $author = User::where('slug', $slug)->with('articles')->firstOrFail();

        return view('frontend.author', compact('author'));
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $admin = User::where('email', config('blogger.admin_email'))->firstOrFail();

        $admin->notify(new ContactFormNotification($request));

        return response()->json(['success' => true]);
    }

    public function search()
    {
        $query = trim(request('query'));

        if (empty($query)) {
            return view('frontend.search', ['articles' => []]);
        }

        $articles = Article::search($query)->paginate(config('blogger.articles_per_page'));

        return view('frontend.search', compact('articles'));
    }

}

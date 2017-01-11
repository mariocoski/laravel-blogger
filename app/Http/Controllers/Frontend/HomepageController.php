<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMessage;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class HomepageController extends Controller
{

    public function autocomplete()
    {
        $response = [];

        $articles = Article::search(request('query'))->where('is_published', 1)->get();

        $response['results'] = $articles->map(function ($item) {
            return [
                "title" => $item->title,
                'url'   => '/blog/' . $item->slug,
                'image' => config('app.url') . "/" . config('blogger.filemanager.upload_path') . "/" . $item->article_image,
            ];
        });

        if ($articles->count() > 4) {
            $response['action'] = ["url" => config('app.url') . "/search?query=" . request('query'), "text" => "View all articles"];
        }

        return response()->json($response);
    }

    public function about()
    {

        $authors = User::all()->filter(function ($user) {
            return $user->hasRole('editor');
        });
        return view('frontend.about', compact('authors'));
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        Mail::send(new ContactFormMessage($request));

        return response()->json(['success' => true]);
    }

    public function search()
    {
        if (empty(request('query'))) {
            return view('frontend.search', ['articles' => []]);
        }
        $articles = Article::search(request('query'))->where('is_published', 1)->paginate(config('blogger.pagination.articles_per_page'));

        return view('frontend.search', compact('articles'));
    }

    public function terms()
    {
        return view('welcome');
    }
}

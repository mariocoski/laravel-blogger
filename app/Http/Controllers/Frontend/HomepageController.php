<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function autocomplete()
    {

        // return response()->json([
        //     "results" => [
        //         [
        //             "title"       => "Result Title",
        //             "url"         => "/optional/url/on/click",
        //             "description" => "Optional Description",
        //             'image'       => 'fox_unsplash.jpg',
        //         ],
        //         [
        //             "title"       => "Result Title",
        //             "url"         => "/optional/url/on/click",
        //             "description" => "Optional Description",
        //             'image'       => 'fox_unsplash.jpeg',
        //         ],
        //         [
        //             "title"       => "Result Title",
        //             "url"         => "/optional/url/on/click",
        //             "description" => "Optional Description",
        //             'image'       => 'fox_unsplash.jpeg',
        //         ],
        //         [
        //             "title"       => "Result Title",
        //             "url"         => "/optional/url/on/click",
        //             "description" => "Optional Description",
        //             'image'       => 'fox_unsplash.jpeg',
        //         ],
        //     ],
        //     // optional action below results
        //     "action"  => [
        //         "url"  => '/path/to/results',
        //         "text" => "View all 202 results",
        //     ],
        // ]);
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
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
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

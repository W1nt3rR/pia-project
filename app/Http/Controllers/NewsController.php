<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(10)
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return redirect()->back();
    }
}

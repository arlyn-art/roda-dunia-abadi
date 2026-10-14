<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title = "News";
        return view('news', compact('title'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('is_active', true)
            ->with('user')
            ->firstOrFail();

        $previousArticle = News::where('is_active', true)
            ->where(function ($query) use ($news) {
                $query->where('date', '>', $news->date)
                      ->orWhere(function ($q) use ($news) {
                          $q->where('date', '=', $news->date)
                            ->where('id', '>', $news->id);
                      });
            })
            ->orderBy('date', 'asc')
            ->orderBy('id', 'asc')
            ->first();

        $nextArticle = News::where('is_active', true)
            ->where(function ($query) use ($news) {
                $query->where('date', '<', $news->date)
                      ->orWhere(function ($q) use ($news) {
                          $q->where('date', '=', $news->date)
                            ->where('id', '<', $news->id);
                      });
            })
            ->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        return view('details.detailNews', compact('news', 'previousArticle', 'nextArticle'));
    }
}
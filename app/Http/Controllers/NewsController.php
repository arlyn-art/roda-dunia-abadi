<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Settings;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title = "News";
        $newsSettings = Settings::where('group', 'news')->get()->keyBy('name');
        $meta = $newsSettings['Meta']->payload ?? [];
        $hero = $newsSettings['Hero']->payload ?? [];
        $heroMedia = $hero['hero_media'] ?? null;

        return view('news', compact('title', 'meta', 'heroMedia'));
    }

    public function show($slug)
    {   
        $news = News::where('slug', $slug)
            ->where('is_active', true)
            ->with('user')
            ->firstOrFail();

        $meta = [
            'meta_title' => $news->meta_title ?: $news->title,
            'meta_description' => $news->meta_description ?: strip_tags($news->description ?? ''),
            'meta_tag' => $news->meta_tag,
        ];

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

        return view('details.detailNews', compact('news', 'previousArticle', 'nextArticle', 'meta'));
    }
}
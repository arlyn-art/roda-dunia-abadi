<?php

namespace App\Http\Controllers;

use App\Models\HomeNews;
use App\Models\HomeProject;
use App\Models\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $title = 'Beranda';

        $homeSettings = Settings::where('group', 'home')->get()->keyBy('name');

        $meta = $homeSettings['Meta']->payload ?? [];

        $heroSection = $homeSettings['Hero section']->payload ?? [];

        $supportSection = $homeSettings['Support section']->payload ?? [];
        if (empty($supportSection)) {
            $supportSection = [
                [
                    'support_counting' => 37,
                    'is_plus'          => false,
                    'support_title'    => 'YEARS OF EXCELLENCE',
                    'support_media'    => 'img/home/icon-1.png',
                ],
                [
                    'support_counting' => 30,
                    'is_plus'          => true,
                    'support_title'    => 'TEAM OF EXPERTISE',
                    'support_media'    => 'img/home/icon-2.png',
                ],
                [
                    'support_counting' => 150,
                    'is_plus'          => true,
                    'support_title'    => 'SITEWORK PROJECTS',
                    'support_media'    => 'img/home/icon-3.png',
                ],
            ];
        }

        $aboutSection = $homeSettings['About section']->payload ?? [];

        $serviceSection = $homeSettings['Services section']->payload ?? [];

        $readySection = $homeSettings['Ready section']->payload ?? [];

        $homeProjects = HomeProject::with('project')
            ->orderBy('sort_order', 'asc')
            ->take(9)
            ->get();

        $featuredProjects = HomeProject::with('project')
            ->where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $homeNews = HomeNews::with('news')
            ->orderBy('sort_order', 'asc')
            ->take(9)
            ->get();

        return view('home', compact('title','homeProjects', 'featuredProjects', 'homeNews', 'meta', 'heroSection', 'supportSection', 'aboutSection', 'serviceSection', 'readySection'));
    }
}

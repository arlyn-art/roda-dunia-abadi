@extends('layouts.app')

@section('content')
    <div class="w-full h-[35vh] overflow-hidden mb-12">
        <img src="{{ $news->thumbnail_url }}" 
            alt="{{ $news->title }}" 
            class="w-full h-auto object-cover">
    </div>

    <div class="w-full md:container mx-auto px-6 py-12 md:py-20">
        <div class="mb-12">
            <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                Article
            </x-ui.title>
        </div>
        <div class="flex flex-col md:flex-row md:gap-12 lg:gap-16">
            <div class="md:w-2/5 lg:w-1/3 mb-12 md:mb-0">
                <div class="md:sticky md:top-28">

                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 leading-tight mb-4 md:order-1">
                        {{ $news->title }}
                    </h1>

                    <div class="text-sm text-gray-500 flex items-center gap-2 mb-6 md:order-2">
                        <span>posted by {{ $news->user->name ?? 'Admin' }}</span>
                        <span>|</span>
                        <span>{{ \Carbon\Carbon::parse($news->date)->format('M d, Y') }}</span>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-t md:order-last md:mt-4">
                        @if(!empty($news->meta_tag))
                            @php
                                $tags = explode(',', $news->meta_tag);
                            @endphp
                            @foreach($tags as $tag)
                                <span class="bg-primary/90 text-white text-xs font-medium px-3 py-1 rounded-full">
                                    {{ trim($tag) }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="md:w-3/5 lg:w-2/3">
                
                <div class="w-full mb-8 md:mb-10 overflow-hidden rounded-xl shadow-lg">
                    <img 
                        src="{{ $news->thumbnail_url }}" 
                        alt="{{ $news->title }}" 
                        class="w-full h-auto object-cover"
                    >
                </div>

                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed news-description tiptap-content">
                    {!! $news->description !!}
                </div>
            </div>

        </div>
        <div class="border-t border-gray-300 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="w-full sm:w-auto">
                @if($previousArticle)
                    <a href="{{ route('articles.show', $previousArticle->slug) }}"
                        class="group relative inline-flex items-center gap-3 py-2 font-semibold text-black transition-all duration-300">

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary text-white
                            opacity-100 translate-x-0
                            sm:opacity-0 sm:-translate-x-3
                            sm:transition-all sm:duration-300 sm:ease-out
                            sm:group-hover:translate-x-0 sm:group-hover:opacity-100">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>

                        <span class="relative z-10
                            after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-primary
                            sm:after:w-0 sm:after:transition-all sm:after:duration-300
                            sm:group-hover:after:w-full
                            sm:transition-transform sm:duration-300 sm:ease-out sm:group-hover:translate-x-1">
                            PREVIOUS ARTICLE
                        </span>
                    </a>
                @endif
            </div>

            <div class="w-full sm:w-auto flex justify-end">
                @if($nextArticle)
                    <a href="{{ route('articles.show', $nextArticle->slug) }}"
                        class="group relative inline-flex items-center gap-3 py-2 font-semibold text-black transition-all duration-300">

                        <span class="relative z-10
                            after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-primary
                            sm:after:w-0 sm:after:transition-all sm:after:duration-300
                            sm:group-hover:after:w-full
                            sm:transition-transform sm:duration-300 sm:ease-out sm:group-hover:-translate-x-1">
                            NEXT ARTICLE
                        </span>

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary text-white
                            opacity-100 translate-x-0
                            sm:opacity-0 sm:translate-x-3
                            sm:transition-all sm:duration-300 sm:ease-out
                            sm:group-hover:translate-x-0 sm:group-hover:opacity-100">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                @endif
            </div>

        </div>
    </div>
@endsection
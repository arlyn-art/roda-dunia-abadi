@extends('layouts.app')

@section('content')
    <section class="relative">
        <img src="{{ !empty($heroMedia) ? asset('storage/' . $heroMedia) : asset('img/featured-projects/thumbnail.jpeg') }}" 
            alt="Hero Projects" 
            class="w-full h-[35vh] object-cover object-center">
    </section>
    <livewire:show-projects />

@endsection
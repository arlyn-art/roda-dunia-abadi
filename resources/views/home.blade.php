@extends('layouts.app')

@section('content')
    <x-hero />
    <x-about />
    <x-services />
    <x-featured-projects :featuredProjects="$featuredProjects" />
    <x-projects :homeProjects="$homeProjects" />
    <x-trusted />
    <x-news />
    <x-partners />
    <x-ready />
@endsection
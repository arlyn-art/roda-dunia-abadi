@extends('layouts.app')

@section('content')
    <x-hero :heroSection="$heroSection" :supportSection="$supportSection" />
    <x-about :aboutSection="$aboutSection" />
    {{-- <x-about :aboutSection="$aboutSection" /> --}}
    <x-services :serviceSection="$serviceSection" />
    <x-featured-projects :featuredProjects="$featuredProjects" />
    <x-projects :homeProjects="$homeProjects" />
    <x-trusted :partners="$partners" />
    <x-news :homeNews="$homeNews" />
    <x-partners />
    <x-ready :readySection="$readySection" />
@endsection
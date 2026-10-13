@extends('layouts.app')

@section('content')
    <section class="bg-background relative">
        <img src="/img/featured-projects/main-image.png" alt="" class="w-full h-[35vh] object-cover object-center">
    </section>

    <div class="md:py-20 py-12 px-6 bg-white">
        <div class="w-full md:container mx-auto">
            
            <div class="mb-12">
                <x-ui.title tag="h1" lineColor="primary" textColor="text-black">
                    Our Partners
                </x-ui.title>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($partners as $partner)
                    <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center h-[160px] md:h-[200px] border border-gray-100">
                        <img 
                            src="{{ asset($partner['image']) }}" 
                            alt="{{ $partner['name'] }}" 
                            class="max-h-full max-w-full object-contain transition duration-300"
                        >
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
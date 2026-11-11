<footer class="w-full text-white bg-black border-t border-gray-800">
    @php
        $footerSetting = \App\Models\Settings::where('group', 'global')->where('subgroup', 'footer')->first();
        $footer = $footerSetting->payload ?? [];

        $contactSetting = \App\Models\Settings::where('group', 'global')->where('subgroup', 'contact')->first();
        $contact = $contactSetting->payload ?? [];

        $socialSetting = \App\Models\Settings::where('group', 'global')->where('subgroup', 'social')->first();
        $socialItems = $socialSetting->payload['items'] ?? [];
    @endphp

    <div class="sm:container w-full mx-auto px-6 xl:px-12 2xl:px-0 py-12 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <div class="flex flex-col space-y-6">
            <a href="/" class="flex items-center space-x-3">
                <div class="w-16 h-16 flex items-center justify-center">
                    <img src="/img/logo-white.png" class="w-full h-auto" alt="Logo PT Roda Dunia Abadi">
                </div>
                <div class="flex flex-col items-start">
                    <span class="block text-xl font-bold tracking-wide text-white">
                        PT RODA DUNIA ABADI
                    </span>
                    <span class="block text-sm font-semibold tracking-wider text-gray-400">
                        SITEWORK CONTRACTOR
                    </span>
                </div>
            </a>

            <div class="leading-relaxed">
                <x-ui.paragraf tag="p" textColor="text-white">
                    {{ $footer['company_description'] ?? 'PT. Roda Dunia Abadi mengerjakan konstruksi jalan raya dan jalan lingkungan, pengerukan dan pengurugan, irigasi dan drainase serta penggalian dan pemindahan tanah.' }}
                </x-ui.paragraf>
            </div>

            {{-- Sosial Media (hanya tampil jika diisi di admin panel) --}}
            @if(!empty($socialItems))
                <div class="flex items-center space-x-4">
                    @foreach($socialItems as $social)
                        @if(!empty($social['url']))
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 flex items-center justify-center rounded-full hover:border-2 hover:border-primary text-white transition" title="{{ ucfirst($social['platform']) }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    @switch($social['platform'])
                                        @case('instagram')
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                            @break
                                        @case('youtube')
                                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                            @break
                                        @case('linkedin')
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                            @break
                                        @case('facebook')
                                            <path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.5 5 15.5 5H18V0h-3.808C10.59 0 9 1.581 9 4.615V8z"/>
                                            @break
                                        @case('tiktok')
                                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                            @break
                                        @case('twitter')
                                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                            @break
                                    @endswitch
                                </svg>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex flex-col space-y-3 md:items-start md:pl-12">
            <x-ui.title tag="h3" lineColor="primary" textColor="text-white" class="font-medium">
                Head Office
            </x-ui.title>
            <div class="leading-relaxed">
                <x-ui.paragraf tag="p" textColor="text-white">
                    {!! nl2br(e($contact['address'] ?? "Jl. Muara baru Komplek Pergudangan\nBlok A9-10 RT. 001 / 017,\nKel Penjaringan, Kec Penjaringan\nJakarta Utara 14440\nINDONESIA")) !!}
                </x-ui.paragraf>
            </div>
        </div>

    </div>
</footer>
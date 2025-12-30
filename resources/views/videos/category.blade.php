<div class="container mx-auto px-4 py-8 max-w-[1280px]">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
            @if($videos->isNotEmpty())
                <span>{{ $videos->first()->category }}</span>
            @else
                <span>Videos</span>
            @endif
        </h2>

        @if($videos->isNotEmpty())
            <p class="text-sm text-gray-600 mt-1">
                {{ $videos->count() }} videos found
            </p>
        @endif
    </div>

    {{-- Video Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-8">

        @forelse($videos as $video)
            <div class="flex flex-col group">

                {{-- Video Box --}}
                <div class="relative w-full aspect-video bg-gray-900 rounded-xl overflow-hidden shadow-sm group-hover:shadow-md transition-all duration-200">

                    @php
                        $videoPath = $video->video;   // DB value
                        $isYoutube = false;
                        $embedUrl = null;

                        // ✅ Check YouTube
                        if (str_contains($videoPath, 'youtube.com') || str_contains($videoPath, 'youtu.be')) {
                            $isYoutube = true;

                            $urlParts = parse_url($videoPath);

                            if (isset($urlParts['query'])) {
                                parse_str($urlParts['query'], $params);
                                if (isset($params['v'])) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . $params['v'];
                                }
                            } else {
                                $videoId = basename(parse_url($videoPath, PHP_URL_PATH));
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            }
                        } else {
                            // ✅ Local Server Video (public folder)
                            $videoUrl = asset($videoPath);
                        }
                    @endphp

                    {{-- YouTube --}}
                    @if($isYoutube)
                        <iframe
                            class="absolute inset-0 w-full h-full"
                            src="{{ $embedUrl }}"
                            title="{{ $video->title }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                    {{-- Local Video --}}
                    @else
                        <video controls class="absolute inset-0 w-full h-full object-cover">
                            <source src="{{ $videoUrl }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif

                    {{-- Badge --}}
                    <span class="absolute bottom-1 right-1 bg-black/80 text-white text-[10px] font-medium px-1.5 py-0.5 rounded-sm">
                        {{ $isYoutube ? 'YouTube' : 'Video' }}
                    </span>
                </div>

                {{-- Video Info --}}
                <div class="mt-3">
                    <h3 class="text-base font-medium text-gray-900 line-clamp-2 group-hover:text-indigo-600 transition">
                        <a href="{{ $video->source_url }}" target="_blank">
                            {{ $video->title }}
                        </a>
                    </h3>

                    <div class="text-sm text-gray-600 mt-1 flex items-center gap-2">
                        <span>{{ $video->created_at->diffForHumans() }}</span>
                        <span class="text-gray-400">•</span>
                        <a href="{{ $video->source_url }}" target="_blank"
                           class="text-indigo-600 hover:text-indigo-800 text-xs font-semibold uppercase">
                            Open Source
                        </a>
                    </div>
                </div>

            </div>
        @empty
            {{-- Empty State --}}
            <div class="col-span-full flex flex-col items-center justify-center py-32 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>

                <p class="text-xl font-medium">No videos found</p>
                <p class="mt-2">Check back later or change filters</p>
            </div>
        @endforelse
    </div>
</div>

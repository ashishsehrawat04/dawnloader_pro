

@extends('components.header')

@section('title','dawnload videos')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-[1280px]">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
            @if($videos->isNotEmpty())
              <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                    {{ $videos->first()->category }}
                </h2>

            @else
              <!-- <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                    Videos
                </h2>
                <span></span> -->
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
                    $videoUrl = null;

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

                {{-- YouTube Video --}}
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

                <div class="text-sm text-gray-600 mt-1 flex items-center gap-2 flex-wrap">
                    <span>{{ $video->created_at->diffForHumans() }}</span>
                    <span class="text-gray-400">•</span>

                    <a href="{{ $video->source_url }}" target="_blank"
                       class="text-indigo-600 hover:text-indigo-800 text-xs font-semibold uppercase">
                        Open Source
                    </a>

                    {{-- ✅ Download Button --}}
                    @if(!$isYoutube)
                        <a href="{{ $videoUrl }}"id ="download_button"
                           download
                           class="ml-auto bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1.5 rounded-md transition">
                            ⬇ Download
                        </a>
                    @else
                        <span class="ml-auto text-xs text-gray-400 cursor-not-allowed">
                            Download disabled
                        </span>
                    @endif
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


    <section id="videoCategorySection" class="bg-white">
        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                Categories
            </h2>

            <div class="grid md:grid-cols-6 gap-6 text-center">

                @foreach ($category as $cat)

                    @php
                        $isSelected = request()->segment(2) === $cat->slug;
                    @endphp

                    <a href="{{ url('category/' . $cat->slug) }}"
                    class="block transform transition duration-300
                            hover:-translate-y-2 hover:shadow-xl
                            rounded-xl p-5 border card
                            {{ $isSelected ? 'bg-green-100 border-green-500 shadow-xl' : 'bg-white border-gray-200' }}"
                    data-aos="zoom-in"
                    style="border-color: aqua;">

                        <div class="font-bold text-lg" style="color:sienna">
                            {{ $cat->name }}
                        </div>

                        <p class="text-gray-500 text-sm mt-2 flex justify-center">
                            @if(!empty($cat->icon))
                                <img src="{{ asset($cat->icon) }}" alt="icon" width="30">
                            @endif
                        </p>

                    </a>

                @endforeach

            </div>

        </div>
    </section>

    <div id="loginModal"
        class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

        <div class="bg-white rounded-xl w-full max-w-md p-6 relative">

            <button id="closeLoginModal"
                    class="absolute top-2 right-2 text-gray-500 hover:text-black">✖</button>

            {{-- LOGIN FORM --}}
            <div id="loginBox">
                <h2 class="text-2xl font-bold mb-4 text-center">Login Required</h2>

                <form id="loginForm">
                    @csrf

                    <input type="email" name="email"
                        placeholder="Email"
                        class="w-full border rounded-md px-3 py-2 mb-3" required>

                    <input type="password" name="password"
                        placeholder="Password"
                        class="w-full border rounded-md px-3 py-2 mb-4" required>

                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md">
                        Login
                    </button>
                </form>

                <p class="text-center text-sm mt-4">
                    Don’t have an account?
                    <button id="showSignup" class="text-indigo-600 font-semibold">
                        Sign up
                    </button>
                </p>
            </div>

            {{-- SIGNUP FORM --}}
            <div id="signupBox" class="hidden">
                <h2 class="text-2xl font-bold mb-4 text-center">Create Account</h2>

                <form id="signupForm">
                    @csrf

                    <input type="text" name="name"
                        placeholder="Name"
                        class="w-full border rounded-md px-3 py-2 mb-3" required>

                    <input type="email" name="email"
                        placeholder="Email"
                        class="w-full border rounded-md px-3 py-2 mb-3" required>

                    <input type="password" name="password"
                        placeholder="Password"
                        class="w-full border rounded-md px-3 py-2 mb-4" required>

                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md">
                        Sign Up
                    </button>
                </form>

                <p class="text-center text-sm mt-4">
                    Already have an account?
                    <button id="showLogin" class="text-indigo-600 font-semibold">
                        Login
                    </button>
                </p>
            </div>

        </div>
    </div>



</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
window.isLoggedIn = @json(auth()->check());
let pendingDownload = null;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    // DOWNLOAD
    $(document).on('click', '#download_button', function (e) {
        e.preventDefault();

        let videoId = $(this).data('video');
        let videoUrl = $(this).data('url');

        if (!window.isLoggedIn) {
            pendingDownload = { videoId, videoUrl };
            $('#loginModal').removeClass('hidden').addClass('flex');
            return;
        }

        startDownload(videoId, videoUrl);
    });

    // LOGIN
    $(document).on('submit', '#loginForm', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('user.login') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function (res) {
                if (res.status === true) {

                    window.isLoggedIn = true;

                    $('#loginModal').addClass('hidden').removeClass('flex');
                    $('#loginForm')[0].reset();

                    afterAuthSuccess();
                }
            }
        });
    });

    // SIGNUP
    $(document).on('submit', '#signupForm', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('user.register') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function () {
                $('#signupForm')[0].reset();
                $('#loginModal').addClass('hidden').removeClass('flex');
                window.isLoggedIn = true;
            }
        });
    });

});

// AFTER LOGIN
function afterAuthSuccess(){
    if (pendingDownload) {
        startDownload(pendingDownload.videoId, pendingDownload.videoUrl);
        pendingDownload = null;
    }
}

// DOWNLOAD
function startDownload(videoId, videoUrl) {
    // $.get("/video/download", { video_id: videoId }, function(){
    //     let link = document.createElement('a');
    //     link.href = videoUrl;
    //     link.download = '';
    //     document.body.appendChild(link);
    //     link.click();
    //     document.body.removeChild(link);
    // });

    // $.ajax({
    //         url: "{{ route('user.login') }}",
    //         type: "POST",
    //         data: {video:id ,

    //         }
    //         success: function (res) {
    //             if (res.status === true) {

    //                 window.isLoggedIn = true;

    //                 $('#loginModal').addClass('hidden').removeClass('flex');
    //                 $('#loginForm')[0].reset();

    //                 afterAuthSuccess();
    //             }
    //         }
    // ~});


}
</script>

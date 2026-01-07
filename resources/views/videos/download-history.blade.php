@extends('components.header')

@section('title','Download Videos')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-[1280px]">

    {{-- Header --}}
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
        </h2>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        {{-- Responsive Table Wrapper --}}
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Video Information
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Download Date
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $index => $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            {{-- Serial Number --}}
                            <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-500">
                                {{ $index + 1 }}
                            </td>

                            {{-- Video Details --}}
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <!-- <p class="text-gray-900 font-semibold whitespace-no-wrap">
                                            {{-- Agar Relationship banayi hai to Video Title dikhayein, nahi to ID --}}
                                            Video ID: {{ $item->video_id ?? 'Unknown' }}
                                        </p> -->
                                        <p class="text-gray-500 text-xs mt-1 truncate w-64" title="{{ $item->file_path }}">
                                            {{ $item->file_path }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                                <p class="text-gray-500 text-xs">
                                    {{ $item->created_at->format('h:i A') }}
                                </p>
                            </td>

                            {{-- Action Buttons --}}
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <a href="{{ $item->file_path }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-1 bg-green-100 text-green-700 hover:bg-green-200 px-3 py-1.5 rounded-md text-xs font-bold transition">
                                    <span>Download / View</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        {{-- Empty State --}}
                        <tr>
                            <td colspan="4" class="px-5 py-12 border-b border-gray-200 bg-white text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-500">No download history found.</p>
                                    <p class="text-sm mt-1">Start downloading videos to see them here.</p>
                                    <a href="{{ url('/') }}" class="mt-4 text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                                        Browse Videos &rarr;
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- MODAL STRUCTURE --}}
    <div id="loginModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl w-full max-w-md p-6 relative">

            <button id="closeLoginModal" class="absolute top-2 right-2 text-gray-500 hover:text-black font-bold text-xl">✖</button>

            {{-- LOGIN FORM (Default Visible) --}}
            <div id="loginBox">
                <h2 class="text-2xl font-bold mb-4 text-center">Login Required</h2>
                <form id="loginForm">
                    @csrf
                    <input type="email" name="email" placeholder="Email" class="w-full border rounded-md px-3 py-2 mb-3" required>
                    <input type="password" name="password" placeholder="Password" class="w-full border rounded-md px-3 py-2 mb-4" required>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md">Login</button>
                </form>
                <p class="text-center text-sm mt-4">
                    Don’t have an account?
                    <button type="button" id="showSignup" class="text-indigo-600 font-semibold underline">Sign up</button>
                </p>
            </div>

            {{-- SIGNUP FORM (Default Hidden) --}}
            <div id="signupBox" class="hidden">
                <h2 class="text-2xl font-bold mb-4 text-center">Create Account</h2>
                <form id="signupForm">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="w-full border rounded-md px-3 py-2 mb-3" required>
                    <input type="email" name="email" placeholder="Email" class="w-full border rounded-md px-3 py-2 mb-3" required>
                    <input type="password" name="password" placeholder="Password" class="w-full border rounded-md px-3 py-2 mb-4" required>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md">Sign Up</button>
                </form>
                <p class="text-center text-sm mt-4">
                    Already have an account?
                    <button type="button" id="showLogin" class="text-indigo-600 font-semibold underline">Login</button>
                </p>
            </div>

        </div>
    </div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
window.isLoggedIn = @json(auth()->check());
window.userId = @json(auth()->id());
let pendingDownload = null;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    // 1. Toggle: Show Signup Form
    $(document).on('click', '#showSignup', function (e) {
        e.preventDefault();
        $('#loginBox').addClass('hidden');
        $('#signupBox').removeClass('hidden');
    });

    // 2. Toggle: Show Login Form
    $(document).on('click', '#showLogin', function (e) {
        e.preventDefault();
        $('#signupBox').addClass('hidden');
        $('#loginBox').removeClass('hidden');
    });

    // 3. Close Modal
    $(document).on('click', '#closeLoginModal', function () {
        $('#loginModal').addClass('hidden').removeClass('flex');
    });

    // 4. DOWNLOAD CLICK (Changed ID to Class)
    $(document).on('click', '.download_button', function (e) {
        e.preventDefault(); // Stop direct download initially

        let videoId = $(this).data('video');
        let videoUrl = $(this).data('url');

        if (!window.isLoggedIn) {
            // Save info to trigger after login
            pendingDownload = { videoId, videoUrl };
            $('#loginModal').removeClass('hidden').addClass('flex');
            return;
        }

        startDownload(videoId, videoUrl);
    });

    // 5. LOGIN SUBMIT
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
                    alert("Login Successful!");
                    afterAuthSuccess();
                } else {
                    alert(res.message || "Login failed");
                }
            },
            error: function(err) {
                alert("Something went wrong");
            }
        });
    });

    // 6. SIGNUP SUBMIT
    $(document).on('submit', '#signupForm', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('user.register') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function (res) {
                // Assuming backend logs user in automatically or returns success
                window.isLoggedIn = true;
                if(res.status ==true){

                $('#signupForm')[0].reset();
                $('#loginModal').addClass('hidden').removeClass('flex');
                alert("Account Created Successfully!");

                }else{
                    alert(res.error);

                }

                //afterAuthSuccess();
            },
            error: function(err) {
                alert("Signup failed. Check details.");
            }
        });
    });

});

// Run after Login/Signup
function afterAuthSuccess(){
    if (pendingDownload) {
        startDownload(pendingDownload.videoId, pendingDownload.videoUrl);
        pendingDownload = null;
    }
}

// Actual Download Logic
// Actual Download Logic
function startDownload(videoId, videoUrl) {


    $.ajax({
        url: "{{ route('download.history') }}",
        type: "GET",
        data: {
            videoId: videoId,
            videoUrl: videoUrl,
            user_id: window.userId
        },
        success: function (res) {
            console.log("History saved successfully");
        },
        error: function(err) {
            console.error("History tracking failed", err);
        }
    });


    let link = document.createElement('a');
    link.href = videoUrl;
    link.download = ''; // Browser filename decide karega
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>
@endsection

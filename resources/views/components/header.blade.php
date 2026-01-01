<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Downloader – Fast & Free</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background: linear-gradient(to bottom right, #4f46e5, #6d28d9);
        }
    </style>
</head>

<body  style="">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">code craft by ashish</h1>

            <ul class="hidden md:flex space-x-6 text-lg">
                <li><a href="#" class="hover:text-indigo-600">Home</a></li>
                <li><a href="#features" class="hover:text-indigo-600">Features</a></li>
                <li><a href="#how" class="hover:text-indigo-600">How It Works</a></li>
                <li><a href="#contact" class="hover:text-indigo-600">Contact</a></li>
            </ul>

            <a href="/download" class="hidden md:block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">
                Download Now
            </a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-bg text-white py-28" data-aos="fade-down">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-4">Download Videos Instantly</h1>
            <p class="text-xl mb-8 opacity-90">
                Fast • Free • Unlimited video downloads for everyone
            </p>

            <form id="urlDwonloaderForm" class="max-w-2xl mx-auto bg-white rounded-xl p-4 flex">
                @csrf
                <input type="text" name="url" id="url-video-download" placeholder="Paste your video link here..."
                       class="w-full outline-none px-4 rounded-l-lg text-gray-700" required>

                <button class="bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-r-lg text-white font-semibold">
                    Download
                </button>
            </form>
        </div>
    </section>

    <!-- FEATURES SECTION -->
      @yield('content')



    <!-- AOS Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 1200 });
    </script>

</body>
</html>

<script>
    fetch("/track-visitor")
        .then(res => res.json())
        .then(data => console.log("Visitor Tracked:", data));
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#videoDownloadForm').on('submit', function (e) {
    e.preventDefault();

    let videoUrl = $('#url-video-download').val();

    $.ajax({
        url: "{{ route('video.url-video-download') }}",
        type: "POST",
        data: {
            url: videoUrl,
            _token: "{{ csrf_token() }}"
        },
        beforeSend: function () {
            console.log('Processing...');
        },
        success: function (response) {
            console.log(response);
            alert('Download started');
        },
        error: function (xhr) {
            alert('Something went wrong');
        }
    });
});
</script>



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

<body class="bg-gray-100 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">VideoDownloader</h1>

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

            <form action="/download" method="POST" class="max-w-2xl mx-auto bg-white rounded-xl p-4 flex">
                @csrf
                <input type="text" name="url" placeholder="Paste your video link here..."
                       class="w-full outline-none px-4 rounded-l-lg text-gray-700" required>

                <button class="bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-r-lg text-white font-semibold">
                    Download
                </button>
            </form>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section id="features" class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                Why Choose Our Downloader?
            </h2>

            <div class="grid md:grid-cols-3 gap-10">

                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition"
                     data-aos="zoom-in">
                    <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png"
                         class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold text-center mb-2">Ultra-Fast</h3>
                    <p class="text-center text-gray-600">Experience lightning speed downloads in seconds.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition"
                     data-aos="zoom-in" data-aos-delay="150">
                    <img src="https://cdn-icons-png.flaticon.com/512/992/992700.png"
                         class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold text-center mb-2">No Limit</h3>
                    <p class="text-center text-gray-600">Download unlimited videos for free. No restrictions!</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition"
                     data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://cdn-icons-png.flaticon.com/512/992/992703.png"
                         class="w-20 mx-auto mb-4">
                    <h3 class="text-xl font-bold text-center mb-2">Safe & Secure</h3>
                    <p class="text-center text-gray-600">Zero risk. Your privacy is always protected.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- HOW IT WORKS SECTION -->
    <section id="how" class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                How It Works
            </h2>

            <div class="grid md:grid-cols-3 gap-10 text-center">

                <div class="p-6" data-aos="fade-right">
                    <span class="text-5xl text-indigo-600 font-bold">1</span>
                    <h4 class="text-xl font-semibold mt-4">Paste Video URL</h4>
                    <p class="text-gray-600 mt-2">Copy the link of the video you want to download.</p>
                </div>

                <div class="p-6" data-aos="fade-up">
                    <span class="text-5xl text-indigo-600 font-bold">2</span>
                    <h4 class="text-xl font-semibold mt-4">Click Download</h4>
                    <p class="text-gray-600 mt-2">Our system fetches and prepares the file instantly.</p>
                </div>

                <div class="p-6" data-aos="fade-left">
                    <span class="text-5xl text-indigo-600 font-bold">3</span>
                    <h4 class="text-xl font-semibold mt-4">Save the File</h4>
                    <p class="text-gray-600 mt-2">Enjoy your downloaded video on any device.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer id="contact" class="bg-gray-900 text-white py-10">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <h3 class="text-2xl font-bold mb-3">VideoDownloader</h3>
            <p class="opacity-70">Fast. Free. Unlimited video downloads.</p>

            <p class="text-sm mt-4 opacity-70">© {{ date('Y') }} All rights reserved.</p>
        </div>
    </footer>

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


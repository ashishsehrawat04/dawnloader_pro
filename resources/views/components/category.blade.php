  <section id="videoCategorySection" class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">
                Categories
            </h2>

            <div class="grid md:grid-cols-6 gap-6 text-center">

                @foreach ($category as $cat)
                    <a href="{{ url('category/' . $cat['slug']) }}"
                    class="block transform transition duration-300
                            hover:-translate-y-2 hover:shadow-xl focus:-translate-y-2
                            focus:shadow-xl bg-white rounded-xl p-5 border border-gray-200 card"
                    data-aos="zoom-in" style ="border-color: aqua;">

                        <div class="font-bold text-lg" style ="color:sienna">
                            {{ $cat['name'] }}
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

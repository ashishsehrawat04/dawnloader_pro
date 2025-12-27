<h2 class="text-3xl font-bold mb-6">
    Videos in: {{ $category->name }}
</h2>

<div class="grid md:grid-cols-3 gap-6">

    @foreach($videos as $video)
        <div class="p-4 border rounded-lg shadow">
            <h3 class="font-semibold text-lg">{{ $video->title }}</h3>
            <p class="text-gray-500">{{ $video->description }}</p>

            <a href="{{ $video->url }}"
               class="text-indigo-600 mt-3 inline-block"
               target="_blank">Watch Video</a>
        </div>
    @endforeach

</div>

<script>
    const inputs = document.querySelectorAll(".form-input");

function addfocus() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remfocus() {
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
}

inputs.forEach(input => {
    input.addEventListener("focus", addfocus);
    input.addEventListener("blur", remfocus)
});
</script>

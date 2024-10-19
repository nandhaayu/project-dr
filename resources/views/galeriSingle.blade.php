<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <article class="py-8 max-w-screen-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Featured Image -->
                <img src="{{ $post->image ? asset($post->image) : asset('assets/img/default-image.jpg') }}" 
                     alt="{{ $post['title'] }}" 
                     class="w-full h-64 object-cover">
        
                <div class="p-6">
                    <h2 class="mb-2 text-4xl tracking-tight font-bold text-green-900">{{ $post['title'] }}</h2>
                    <div class="mb-4 text-gray-500">
                        By 
                        <a href="/authors/{{ $post->author->username }}" class="text-base hover:underline">{{ $post->author->name }}</a> 
                        | {{ $post->created_at->format('j F Y') }}
                    </div>
                    <p class="my-4 text-gray-700 font-light leading-relaxed">{{ $post['body'] }}</p>
                    <a href="/galeri" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
                </div>
            </article>
        </div>
    </section>
</x-layout>

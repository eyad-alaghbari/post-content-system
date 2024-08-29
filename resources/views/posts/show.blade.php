<!-- resources/views/posts/index.blade.php -->
<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 p-4 bg-white shadow-md rounded-xl">
            <div class="flex flex-col gap-4 p-4 bg-white shadow-md rounded-xl">

                <div class="flex justify-between items-center ">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <a href="{{ route('posts.index') }}"
                        class="  mt-4 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <-- Back
                    </a>
                </div>

                <p>{{ !!$post->content }}</p>

                @if ($post->media_type == 'jpg' || $post->media_type == 'png')
                    <img src="{{ asset('storage/' . $post->media_path) }}" alt="Post Image">
                @elseif ($post->media_type == 'mp4')
                    <video controls>
                        <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                    </video>
                @elseif ($post->media_type == 'mp3')
                    <audio controls>
                        <source src="{{ asset('storage/' . $post->media_path) }}" type="audio/mp3">
                    </audio>
                @endif

            </div>


            <!-- Pagination links -->
        </div>
    </div>

</x-app-layout>

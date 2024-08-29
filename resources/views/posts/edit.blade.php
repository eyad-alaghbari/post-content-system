    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Post') }}
            </h2>
        </x-slot>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Create Post
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Create a new post
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 pt-4 sm:px-6">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 ">Title</label>
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                placeholder="Title" value="{{ $post->title }}" required>
                            @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center space-x-4 mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 ">Content</label>
                            <textarea name="content" id="content"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                placeholder="Content" rows="4">{{ $post->content }}</textarea>
                            @error('content')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="media" class="block text-sm font-medium text-gray-700 ">Upload Media</label>
                            <input type="file" name="media" id="media"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm w-1/2"
                                accept="image/*,video/*,audio/*">
                            <img id="imagePreview" src="{{ asset('storage/' . $post->media) }}"
                                alt="Preview of the image" width="200" height="200" style="display: none;" />
                            <video id="videoPreview" src="{{ asset('storage/' . $post->media) }}"
                                alt="Preview of the video" controls style="display: none;"></video>
                            <audio id="audioPreview" src="{{ asset('storage/' . $post->media) }}"
                                alt="Preview of the audio" controls style="display: none;"></audio>
                            @error('media')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 ">Category</label>
                            <select name="category" id="category"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                <option value="Blog" {{ $post->category == 'Blog' ? 'selected' : '' }}>Blog</option>
                                <option value="News" {{ $post->category == 'News' ? 'selected' : '' }}>News</option>
                                <option value="Tutorial" {{ $post->category == 'Tutorial' ? 'selected' : '' }}>Tutorial
                                </option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end space-x-4 mb-4">
                            <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                style="background-color: rgb(55, 55, 237) !important">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // public/js/mediaPreview.js
            document.getElementById('media').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const imgPreview = document.getElementById('imagePreview');
                const videoPreview = document.getElementById('videoPreview');
                const audioPreview = document.getElementById('audioPreview');

                imgPreview.style.display = 'none';
                videoPreview.style.display = 'none';
                audioPreview.style.display = 'none';

                if (file.type.startsWith('image/')) {
                    imgPreview.src = URL.createObjectURL(file);
                    imgPreview.style.display = 'block';
                } else if (file.type.startsWith('video/')) {
                    videoPreview.src = URL.createObjectURL(file);
                    videoPreview.style.display = 'block';
                } else if (file.type.startsWith('audio/')) {
                    audioPreview.src = URL.createObjectURL(file);
                    audioPreview.style.display = 'block';
                }
            });
        </script>
    </x-app-layout>

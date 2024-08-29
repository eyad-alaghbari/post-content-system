<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <h1 class="text-2xl font-bold mb-4">Posts List</h1>

            <input type="text" id="search-input" placeholder="Search posts..." class="w-full p-2 mb-4 border rounded-lg"
                oninput="searchPosts()">

            <div id="posts-table" class="border shadow-md rounded-lg">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="p-2 border-b-2 border-gray-300">ID</th>
                            <th class="p-2 border-b-2 border-gray-300">Title</th>
                            <th class="p-2 border-b-2 border-gray-300">Content</th>
                            <th class="p-2 border-b-2 border-gray-300">Category</th>
                            <th class="p-2 border-b-2 border-gray-300">Created At</th>
                            <th class="p-2 border-b-2 border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="posts-body"></tbody>
                </table>
            </div>

            <div id="pagination-links" class="mt-4 flex justify-center"></div>
        </div>
    </div>


    @vite('resources/js/post.js')
    
</x-app-layout>

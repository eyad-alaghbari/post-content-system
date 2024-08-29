document.addEventListener('DOMContentLoaded', () => {
    window.currentPage = 1; // اجعل المتغير عامًا للوصول إليه من أي مكان

    // اجعل الدالة متاحة على مستوى الـ window
    window.searchPosts = function(page = 1) {
        let query = document.getElementById('search-input').value;

        fetch(`/api/posts/search?page=${page}&query=${query}`)
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                let postsBody = document.getElementById('posts-body');
                postsBody.innerHTML = '';

                data.data.forEach(post => {
                    console.log(post.id);
                    const urledit = `/posts/${post.id}/edit`;
                    let row = `<tr>
                                <td class="p-2 border-b border-gray-300">${post.id}</td>
                                <td class="p-2 border-b border-gray-300">${post.title}</td>
                                <td class="p-2 border-b border-gray-300">${post.content.substring(0, 50)}</td>
                                <td class="p-2 border-b border-gray-300">${post.category}</td>
                                <td class="p-2 border-b border-gray-300">${new Date(post.created_at).toLocaleDateString()}</td>
                                <td class="flex justify-between  p-2 text-sm text-gray-900 border-b border-gray-300">
                                <a href="/posts/${post.id}" class="border p-2 border-gray-300 text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="/posts/${post['id']}/edit" class="border p-2 border-gray-300 text-green-600 hover:text-indigo-900">Edit</a>
                                <button  href="/posts/${post.id}/destroy" class="border p-2 border-gray-300 text-red-
                                hover:text-red-900">Delete</button>

                                </td>
                            </tr>`;
                    postsBody.innerHTML += row;
                });

                setupPagination(data.pagination);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    window.setupPagination = function(pagination) {
        let paginationLinks = document.getElementById('pagination-links');
        paginationLinks.innerHTML = '';

        if (pagination.last_page > 1) {
            if (pagination.current_page > 1) {
                paginationLinks.innerHTML +=
                    `<button onclick="searchPosts(${pagination.current_page - 1})" class="p-2 m-1 border rounded">Previous</button>`;
            }

            for (let i = 1; i <= pagination.last_page; i++) {
                paginationLinks.innerHTML +=
                    `<button onclick="searchPosts(${i})" class="p-2 m-1 border rounded ${i === pagination.current_page ? 'bg-blue-500 text-white' : ''}">${i}</button>`;
            }

            if (pagination.current_page < pagination.last_page) {
                paginationLinks.innerHTML +=
                    `<button onclick="searchPosts(${pagination.current_page + 1})" class="p-2 m-1 border rounded">Next</button>`;
            }
        }
    }

    // استدعاء البحث في الصفحة الأولى عند التحميل
    searchPosts();
});

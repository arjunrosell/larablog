<x-layout>
    <div class="flex justify-between mb-6">
        <x-header-title>Our Blog Posts</x-header-title>
        @auth
            <div class="flex justify-center items-center">
                <a href="{{ route('posts.create') }}">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create Blog
                    </button>
                </a>
            </div>
        @endauth
    </div>
    <div>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <li>
                    <div
                        class="max-w-sm p-6 items-stretch h-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                        </a>
                        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">
                            {{ Str::words($post->content, 25) }}
                        </p>
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <button type="button"
                                class="text-white bg-blue-700 border border-blue-300 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Read More
                                </button>
                            </a>
                        </div>
                        @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <button type="button"
                                class="text-gray bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Edit Post
                            </button>
                        </a>
                        @endcan
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>

<x-layout>
    <div class="flex justify-between mb-6">
        <x-header-title>Our Blog Posts</x-header-title>
        {{-- @auth
            <div class="flex justify-center items-center">
                <a href="{{ route('posts.create') }}">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create Post
                    </button>
                </a>
            </div>
        @endauth --}}
    </div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Post ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Author
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $post->id }}
                </th>
                <td class="px-6 py-4">
                   {{ $post->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $post->created_at->format('d/m/Y') }}
                </td>

                <td class="px-6 py-4">
                    {{ $post->user->name }}
                </td>
                <td class="flex px-6 py-4 gap-1">
                    <a href="{{ route('admin.posts.edit', $post->id) }}">
                        <button type="button"
                            class="text-white border border-gray-300  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-700 border border-gray-300  hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                            Delete
                    </form>
                </td>
            </tr>
            @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   No post found.
                </th>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-layout>

<x-layout>
    <div class="flex justify-end mb-6">
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

    <div class="w-full dark:bg-gray-800">
        <div class="mx-auto max-w-7xl pt-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    <x-header-title>Our Blog Posts</x-header-title>
                </h2>
                <p class="text-lg leading-8 text-gray-600 dark:text-gray-300">
                    Dive into the latest in technology with our insightful blog posts.
                </p>
            </div>
            <div
                class="mx-auto mt-8 grid max-w-1xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
                @foreach ($posts as $post)
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="{{ asset('storage/'.$post['thumbnail']) }}" alt="Cinque Terre" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                        <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="mr-8">{{ $post->created_at->format('d/m/Y') }}</time>
                        <div class="-ml-4 flex items-center gap-x-4">
                            <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                <circle cx="1" cy="1" r="1"></circle>
                            </svg>
                            <div class="flex gap-x-2.5">
                                <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10"> {{ $post->user->name }}
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                        <a href="{{ route('posts.show', $post->id) }}"><span class="absolute inset-0"></span>{{ Str::limit($post->title, 68) }}</a>
                    </h3>
                </article>
                @endforeach
            </div>
        </div>
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>

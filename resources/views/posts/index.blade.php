<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    @vite(['resources/js/app.js'])

    <title>Delta Blog</title>
</head>

<body class="bg-slate-100">
    {{-- Navbar --}}
    @include('posts.navbar')

    <div class="px-6 2xl:px-60 py-8">
        <div class="flex justify-between container mx-auto">
            <div class="w-full lg:w-8/12">

                <!-- Section Hedline -->
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                        Posts
                    </h1>
                </div>

                <!-- Post -->
                <div id="posts" class="space-y-4">
                    @forelse ($posts as $post)
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                                <div class="flex justify-between items-center">
                                    <span class="font-light text-gray-600">
                                        {{ $post->created_at->format('F d, Y') }}
                                    </span>
                                    <p class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">
                                        {{ $post->category->name }}</p>
                                </div>
                                <div class="mt-2">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="text-2xl text-gray-700 font-bold hover:underline">Build
                                        {{ Str::limit($post->title, 60, '...') }}
                                    </a>
                                    <p class="mt-2 text-gray-600">
                                        {{ Str::limit($post->body, 150, '...') }}
                                    </p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="text-blue-500 hover:underline">Read more</a>
                                    <div>
                                        <a href="https://alnahian2003.github.io" class="flex items-center"><img
                                                src="https://avatars.githubusercontent.com/u/61485238" alt="avatar"
                                                class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block" />
                                            <h1 class="text-gray-700 font-bold hover:underline">
                                                {{ $post->user->name }}
                                            </h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        Uh oh! seems like the author don't have enough time to write 😟
                    @endforelse
                </div>


                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Aside -->
            <div class="-mx-8 w-4/12 hidden lg:block">
                <div class="px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">
                        About Me
                    </h1>
                    <div class="flex flex-col text-sm bg-white px-8 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                        <p>FullStack Guy.
                            Loves PHP 💜, Laravel ❤, WordPress 💙 & Vue 💚
                            <br>
                            <br>
                            '𝗮𝗹𝗻𝗮𝗵𝗶𝗮𝗻𝟮𝟬𝟬𝟯' — Google Me
                        </p>

                    </div>
                </div>

                <div class="px-8 mt-10">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">
                        Categories
                    </h1>
                    <div class="flex flex-col bg-white px-4 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                        <ul>
                            @forelse ($categories as $category)
                                <li>
                                    <p class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                        {{ $category->name }} ({{ $category->posts_count }})
                                    </p>
                                </li>
                            @empty
                                As there's no post exist, how can you expect a category to exist?
                            @endforelse
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="px-6 2xl:px-60 py-2 bg-gray-800 text-gray-100">
        <div class="flex flex-col justify-between items-center container mx-auto md:flex-row">
            <a href="#" class="text-2xl font-bold">Delta</a>
            <p class="mt-2 md:mt-0">All rights reserved 2022.</p>
        </div>
    </footer>
</body>

</html>

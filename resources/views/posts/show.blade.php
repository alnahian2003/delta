@vite(['resources/js/app.js'])

<body class="bg-slate-100">

    {{-- Navbar --}}
    @include('posts.navbar')

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://avatars.githubusercontent.com/u/61485238" alt="Al Nahian">
                            <div>
                                <a href="https://alnahian2003.github.io" rel="author"
                                    class="text-xl font-bold text-gray-900 ">{{ $post->user->name }}</a>
                                <p class="text-base font-light text-gray-500 "><time pubdate
                                        datetime=" {{ $post->created_at }}"
                                        title="{{ $post->created_at->format('F d, Y') }}">
                                        {{ $post->created_at->format('F d, Y') }}</time></p>
                            </div>
                            @auth
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    class="px-2 py-1 bg-indigo-600 text-gray-100 font-bold rounded hover:bg-gray-500 ml-4">Edit
                                    Post</a>
                            @endauth
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                        {{ $post->title }}
                    </h1>
                    <span class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">
                        {{ $post->category->name }}</span>

                    <x-tag-pill :tagCsv="$post->tags" />
                </header>
                <p class="lead">{{ $post->body }}</p>
            </article>
        </div>
    </main>

</body>

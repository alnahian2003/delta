{{-- Navigation --}}
<nav class="bg-white px-6 2xl:px-60 py-4 shadow">
    <div class="flex flex-col container mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <a href="{{ config('app.url') }}" class="text-gray-800 text-xl font-bold md:text-2xl">Delta <sup
                        class="bg-indigo-100 text-indigo-700 text-sm rounded-full px-2">Blog</sup></a>
            </div>

            <div>
                <a href="{{ route('about') }}" class="text-gray-800 hover:text-blue-500 mx-4 my-0">About us</a>
            </div>
        </div>

    </div>
</nav>

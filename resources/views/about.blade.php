<x-guest-layout>
    @include('posts.navbar')
    <main class="max-w-xl mx-auto mt-16 space-y-6 text-center px-4">
        <h1 class="text-4xl">About Me</h1>

        <img src="https://avatars.githubusercontent.com/u/61485238" class="rounded-full object-cover w-16 mx-auto"
            alt="Al Nahian">
        <h2 class="text-2xl">Al Nahian</h2>
        <a href="https://github.com/alnahian2003" class="text-indigo-600">@alnahian2003</a>

        <p class="text-left">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed molestiae animi possimus
            magnam quae asperiores
            libero totam nisi odit. Quam corrupti amet quo consequuntur. Libero qui expedita sed deleniti debitis?</p>
        <hr>
        <a href="{{ url()->previous() == url()->current() ? config('app.url') : url()->previous() }}"
            class="text-indigo-600 font-bold">Go Back</a>
    </main>
</x-guest-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h3 class="font-semibold text-lg text-indigo-600 leading-tight mt-4">
            {{ __('Howdy, ' . Auth::user()->name . ' 👋') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex space-x-10">
                    <a href="{{ route('admin.posts') }}"
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                        <h5 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900">{{ $total_posts }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Total Posts</p>
                    </a>

                    <a href="{{ route('admin.category.index') }}"
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $total_category }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Total Category</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

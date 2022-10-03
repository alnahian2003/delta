<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.posts.create') }}"
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none ">
                Create a new post</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Title
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Category
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $post->id }}
                                        </th>
                                        <td class="py-4 px-6">
                                            <a href="{{ route('posts.show', $post->id) }}">
                                                {{ substr($post->title, 16) }}
                                            </a>
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $post->category->name }}
                                        </td>
                                        <td class="py-4 px-6 text-center space-x-6 flex justify-center">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>

                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="font-medium text-red-600 hover:underline"
                                                    type="submit">Delete?</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            No Posts Exists
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

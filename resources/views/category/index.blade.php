<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

                        <div class="px-4">
                            <form action="{{ route('admin.category.store') }}" method="POST"
                                class="flex flex-row justify-center place-items-center gap-6">
                                @csrf
                                <div class="mb-5 grow">
                                    <label for="category" class="mb-3 block text-base font-medium text-[#07074D]">
                                        New Category Name
                                    </label>
                                    <input type="text" name="name" id="category"
                                        placeholder="Give an unique category name"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        value="{{ old('name') }}" autofocus />
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div>
                                    <button
                                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                                        type="submit">
                                        Create Category
                                    </button>
                                </div>
                            </form>
                        </div>

                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Category ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Category Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Available Posts
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6">
                                            {{ $category->id }}
                                        </td>
                                        <th scope="row" class="py-4 px-6 font-bold text-gray-900 whitespace-nowrap">
                                            {{ $category->name }}
                                            @unless($category->created_at->eq($category->updated_at))
                                                <span
                                                    class="text-indigo-500 bg-indigo-50 rounded-full px-2 text-sm">EDITED</span>
                                            @endunless
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $category->posts_count }}
                                        </td>
                                        <td class="py-4 px-6 text-center space-x-6 flex justify-center">
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>

                                            <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="post">
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
                                            No category exists. Create one!
                                        </th>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

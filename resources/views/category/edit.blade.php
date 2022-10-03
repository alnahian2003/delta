<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex items-center justify-center p-12">
                        <div class="mx-auto w-full max-w-[550px]">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <label for="category" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Category Name
                                    </label>
                                    <input type="text" name="name" id="category"
                                        placeholder="Give an unique category name"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        value="{{ $category->name }}" />
                                    @error('title')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror

                                </div>

                                <button
                                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                                    type="submit">
                                    Edit Category
                                </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

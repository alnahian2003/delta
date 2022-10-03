<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex items-center justify-center p-12">
                        <div class="mx-auto w-full max-w-[550px]">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Title
                                    </label>
                                    <input type="text" name="title" id="title"
                                        placeholder="Give a nice title for your post"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        value="{{ $post->title }}" autofocus />
                                    @error('title')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="mb-5">
                                    <label for="category" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Category
                                    </label>
                                    <select name="category_id" id="category"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                        <option selected disabled>Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected($post->category->id == $category->id)>
                                                {{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="mb-5">
                                    <label for="tags" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Tags
                                    </label>
                                    <input type="text" name="tags" id="tags"
                                        placeholder="Select some tags (comma separated)"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        value="{{ $post->tags }}" />
                                    @error('tags')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div class="mb-5">
                                    <label for="content" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Content
                                    </label>
                                    <textarea rows="4" name="body" id="content" placeholder="Type your post content"
                                        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $post->body }}</textarea>
                                    @error('body')
                                        <p class="mt-2 text-sm text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <button
                                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                                        type="submit">
                                        Edit Post
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

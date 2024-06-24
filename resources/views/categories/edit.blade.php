<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif
                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                            <input type="text" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('category_name') border-red-500 @enderror" placeholder="Rent" required aria-label="Category Name" />
                            @error('category_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select type</label>
                            <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('type') border-red-500 @enderror">
                                <option selected disabled>Select type</option>
                                <option value="payment" {{ old('type', $category->type ?? '') == 'payment' ? 'selected' : '' }}>Payment</option>
                                <option value="expense" {{ old('type', $category->type ?? '') == 'expense' ? 'selected' : '' }}>Expense</option>
                            </select>
                            @error('type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" name="description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('description') border-red-500 @enderror" placeholder="Max 500 characters...">{{ old('description', $category->description ?? '') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ isset($category) ? 'Update' : 'Add' }} Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
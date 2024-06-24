<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bill') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ isset($bill) ? route('bills.update', $bill->id) : route('bills.store') }}" method="POST">
                    @csrf
                    @if(isset($bill))
                        @method('PUT')
                    @endif
                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bill Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $bill->name ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('name') border-red-500 @enderror" placeholder="Rent" required aria-label="Bill Name" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                            <input type="text" id="amount" name="amount" value="{{ old('amount', $bill->amount ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('amount') border-red-500 @enderror" placeholder="200.00" required aria-label="Amount" />
                            @error('amount')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select type</label>
                            <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('type') border-red-500 @enderror">
                                <option selected disabled>Select type</option>
                                <option value="monthly" {{ old('type', $bill->type ?? '') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="annual" {{ old('type', $bill->type ?? '') == 'annual' ? 'selected' : '' }}>Annual</option>
                            </select>
                            @error('type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 w-full sm:w-1/2 relative">
                            <!-- <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label> -->
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker type="text" name="next_due_date" value="{{ old('next_due_date', $bill->next_due_date ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('next_due_date') border-red-500 @enderror" datepicker-format="yyyy-mm-dd" placeholder="Due Date">
                            @error('next_due_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ isset($bill) ? 'Update' : 'Add' }} Bill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
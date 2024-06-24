<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Client') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
                    @csrf
                    @if(isset($client))
                        @method('PUT')
                    @endif
                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $client->name ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('name') border-red-500 @enderror" placeholder="Tariq St Patrick" required aria-label="Client Name" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No.</label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $client->phone_number ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('phone_number') border-red-500 @enderror" placeholder="+254 727 584 504" required aria-label="Phone Number" />
                            @error('phone_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap w-full max-w-full">
                        <div class="mb-5 w-full sm:w-1/2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $client->email ?? '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light @error('email') border-red-500 @enderror" placeholder="saintp@gmail.com" required aria-label="email" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ isset($client) ? 'Update' : 'Add' }} Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
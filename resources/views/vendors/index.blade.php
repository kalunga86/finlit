<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendors') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="overflow-hidden mb-4">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Vendor List</h2>
                <a href="{{ route('vendors.new') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Vendor
                </a>
            </div>
            <div class="relative overflow-x-auto">

            </div>
        </div>

        <div class="container mx-auto  px-0">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($vendors as $vendor)
                <div class="client-box  max-w-full bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="flex flex-col h-full">
                        <!-- Card top -->
                        <div class="flex-grow p-5">
                            <div class="flex justify-between items-start">
                                <!-- Image + name -->
                                <header>
                                    <div class="flex mb-2">
                                        <a class="relative inline-flex items-start mr-5" href="{{ route('vendors.edit', $vendor->id) }}">
                                            <!-- <div class="absolute top-0 right-0 -mr-2 bg-white rounded-full shadow" aria-hidden="true">
                                                <svg class="w-8 h-8 fill-current text-yellow-500" viewBox="0 0 32 32">
                                                    <path d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                                </svg>
                                            </div> -->
                                            <img class="rounded-full" src="{{ url('/img/' . $vendor->avatar) }}" width="74" height="74" alt="{{ $vendor->name }}" />
                                        </a>
                                        <div class="mt-1 pr-1">
                                            <a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                                <h2 class="text-xl leading-snug justify-center font-semibold">{{ $vendor->name }}</h2>
                                            </a>
                                            <div class="flex items-center"><span class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">{{ $vendor->email }}</div>
                                            <div class="flex items-center"><span class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">{{ $vendor->phone_number }}</div>
                                        </div>
                                    </div>
                                </header>
                                <!-- Menu button -->
                                <div class="relative inline-flex flex-shrink-0" x-data="{ open: false }">
                                    <button class="text-gray-400 hover:text-gray-500 rounded-full focus:outline-none focus-within:ring-2" :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                        <span class="sr-only">Menu</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <circle cx="16" cy="16" r="2" />
                                            <circle cx="10" cy="16" r="2" />
                                            <circle cx="22" cy="16" r="2" />
                                        </svg>
                                    </button>
                                    <div class="origin-top-right z-10 absolute top-full right-0 min-w-[9rem] bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
                                        <ul>
                                            <li>
                                                <a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3" href="{{ route('vendors.edit', $vendor->id) }}" @click="open = false" @focus="open = true" @focusout="open = false">Edit</a>
                                            </li>
                                            <li>
                                                <!-- <a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a> -->
                                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3">Remove</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Bio -->
                            <!-- <div class="mt-2">
                                <div class="text-sm">Fitness Fanatic, Design Enthusiast, Mentor, Meetup Organizer & PHP Lover.</div>
                            </div> -->
                        </div>
                        <!-- Card footer -->
                        <div class="border-t border-gray-200">
                            <div class="flex divide-x divide-gray-200">
                                <a class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4" href="mailto:{{ $vendor->email }}">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 fill-current flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                            <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                        </svg>
                                        <span>Send Email</span>
                                    </div>
                                </a>
                                <a class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4 group" href="{{ route('clients.edit', $vendor->id) }}">
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                            <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                        </svg>
                                        <span>Edit Profile</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="custom-pagination flex justify-between items-center mt-4">
            <div>
                <!-- Custom pagination text, if needed -->
                <p class="text-gray-600">Showing {{ $vendors->firstItem() }} to {{ $vendors->lastItem() }} of {{ $vendors->total() }} results</p>
            </div>
            <div>
                {{ $vendors->links('pagination::tailwind') }} <!-- Use the Tailwind pagination view -->
            </div>
        </div>

    </div>
</x-app-layout>
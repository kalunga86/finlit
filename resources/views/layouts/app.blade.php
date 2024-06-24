<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        <link type="text/css" href="{{ asset('css/finlit.css') }}" rel="stylesheet" />
    </head>

    <body class="bg-[#f0f1f6]">
        <div class="flex h-screen overflow-hidden relative">
            <!-- Main content -->
            <div class="flex-1 flex flex-col main-content">
                <nav class="border-gray-200 dark:bg-gray-900 px-8">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4">
                        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FinLit</span> -->
                            <img class="brand w-24" src="{{url('/img/finlit-logo.png')}}" alt="finlit-logo" />
                        </a>
                        <div class="flex items-center space-x-3 md:hidden rtl:space-x-reverse">
                            <button
                                data-collapse-toggle="navbar-user"
                                type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                aria-controls="navbar-user"
                                aria-expanded="false"
                                id="main-menu-toggle"
                            >
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                            <button class="p-2 sidebar-toggle bg-gray-200 rounded-md">
                                <span class="sr-only">Toggle Sidebar</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>
                        <div class="hidden w-full md:flex md:w-auto" id="navbar-user">
                            <ul class="flex flex-col font-medium mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-900 md:dark:bg-transparent dark:border-gray-700 rtl:space-x-reverse">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Overview</a>
                                </li>
                                <li>
                                    <a href="{{ route('payments') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Payments</a>
                                </li>
                                <li>
                                    <a href="{{ route('expenses') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Expenses</a>
                                </li>
                                <li>
                                    <a href="{{ route('clients') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Clients</a>
                                </li>
                                <li>
                                    <a href="{{ route('vendors') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Vendors</a>
                                </li>
                                <li>
                                    <a href="{{ route('bills') }}" class="block py-2 px-3 text-gray-900 dark:text-white">Bills</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <main class="flex-1 overflow-y-auto p-8">
                    {{ $slot }}
                </main>
            </div>
            <!-- Right sidebar -->
            <aside class="sidebar w-1/4 md:w-1/4 bg-[#f9fafc] hidden md:block border-l-1 border-[#e1e2eb] px-4 overflow-y-auto">
                <nav class="border-gray-200 dark:bg-gray-900">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

                        <div class="flex items-center space-x-3 "></div>
                        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                            
                            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative mr-2 inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                                    ></path>
                                </svg>

                                <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900"></div>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownNotification" class="absolute r-0 z-20 hidden w-full max-w-64 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                                <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                    Notifications
                                </div>

                                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                    @foreach ($notifications as $notification)
                                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <div class="w-full ps-3">
                                                <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Finlit</span>: {{ $notification->data['name'] }} is due on {{ $notification->data['next_due_date'] }}. Amount: ${{ $notification->data['amount'] }}</div>
                                                <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                    <div class="inline-flex items-center">
                                        <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                            <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                        </svg>
                                        View all
                                    </div>
                                </a>
                            </div>

                            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-12 h-12 rounded-full" src="{{url('/img/team-4.jpg')}}" alt="user photo" />
                            </button>
                            <div class="absolute r-0 z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                    <!-- <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span> -->
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <li>
                                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                        <form action="{{ route('logout') }}" method="post" class="d-none" id="logout-form">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="p-4">
                    <div class="grid grid-cols-2 px-4">
                        <!-- Categories Section -->
                        <div class="flex items-center bg-gray-50 dark:bg-gray-800 w-full h-16">
                            <h4 class="text-gray-400 dark:text-gray-500">Wallet</h4>
                        </div>
                        
                        <!-- Icon Button Section -->
                        <div class="flex items-center justify-end">
                        <a href="#" class="flex items-center justify-center w-10 h-10 rounded border-2 border-gray-200 border-dashed dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <ul class="space-y-4 font-medium">
                        <li>
                            <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div class="bg-blue-500 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-semibold">Home Wallet</div>
                                    <div class="text-sm text-gray-500">$235,000</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div class="bg-green-500 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path
                                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-semibold">Investment</div>
                                    <div class="text-sm text-gray-500">$875,000</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="grid grid-cols-2 px-4">
                        <!-- Categories Section -->
                        <div class="flex items-center bg-gray-50 dark:bg-gray-800 w-full h-16">
                            <h4 class="text-gray-400 dark:text-gray-500">Categories</h4>
                        </div>
                        
                        <!-- Icon Button Section -->
                        <div class="flex items-center justify-end">
                        <a href="{{ route('categories.new') }}" class="flex items-center justify-center w-10 h-10 rounded border-2 border-gray-200 border-dashed dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <ul class="space-y-4 font-medium">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="bg-red-500 p-2 rounded-lg">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-base font-semibold">{{ $category->category_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $category->type }}</div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </aside>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

        <script src="{{ asset('js/finlit.js') }}" async></script>
        <script src="{{ asset('js/charts.js') }}" async></script>
    </body>
</html>

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
        <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css" rel="stylesheet" />

        <link type="text/css" href="{{ asset('css/finlit.css') }}" rel="stylesheet" />
    </head>

    <body class="bg-[#f9fafc]">
        <div class="flex h-screen overflow-hidden relative">
            <!-- Main content -->
            <div class="flex-1 flex flex-col main-content p-5 pt-0">
                <nav class="bg-transparent p-4">
                    <div class="relative container mx-auto flex justify-between items-center">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('dashboard') }}" class="text-xl font-bold">
                                <img class="brand w-24" src="{{url('/img/finlit-logo.png')}}" alt="finlit-logo" />
                            </a>
                        </div>
                        <!-- Search Bar -->
                        <div class="max-w-md hidden md:flex flex-grow mx-4 justify-center">
                            <div class="relative w-full max-w-xl mx-auto bg-white rounded-full">
                                <input placeholder="e.g. Finance" class="rounded-full w-full h-12 bg-transparent py-2 pl-8 pr-32 outline-none border-2 border-gray-100 hover:outline-none focus:ring-teal-200 focus:border-teal-200" type="text" name="query" id="query">
                                <button type="submit" class="bg-blue-500 absolute inline-flex items-center h-8 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none right-2 top-2 bg-teal-600 sm:px-6 sm:text-base sm:font-medium hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                    <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Search
                                </button>
                            </div>                
                        </div>
                        <!-- Navigation Links and Buttons -->
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('dashboard') }}" class="hidden md:block text-gray-700">Overview</a>
                            <a href="#" class="hidden md:block text-gray-700">Finance</a>
                            <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown" class="hidden md:block p-2 bg-blue-500 text-white rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </button>
                            <button class="md:hidden p-2 bg-blue-500 text-white rounded" id="menu-toggle">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                            </button>
                            <button class="p-2 sidebar-toggle md:hidden bg-orange-500 text-white rounded-md">
                                <span class="sr-only">Toggle Sidebar</span>
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                            </button>

                            <div id="mega-menu-icons-dropdown" class="absolute right-20 z-10 mt-5 grid hidden min-w-96 grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">PAYMENTS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('payments') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Payments</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Payments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('payments.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Payment</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Payment
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">EXPENSES</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('expenses') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Expenses</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Expenses
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('expenses.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Expense</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Expense
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">WALLET</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('wallets') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Wallets</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Wallets
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('wallets.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Wallet</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Wallet
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">CLIENTS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('clients') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Clients</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Clients
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('clients.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Client</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Client
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">VENDORS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('vendors') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Vendors</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Vendors
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('vendors.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Vendor</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Vendor
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 text-gray-900 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">CATEGORIES</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('categories') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Categories</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Categories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('categories.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Category</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Category
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">BILLS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('bills') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Bills</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Bills
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bills.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Bill</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Bill
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="hidden md:hidden" id="mobile-menu">
                        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                            <a href="{{ route('dashboard') }}" class="block text-gray-700">Overview</a>
                            <a href="#" id="mobile-mega-menu-icons-dropdown-button" data-dropdown-toggle="mobile-mega-menu-icons-dropdown" class="block text-gray-700 mb-4">Finance</a>
                            <!-- Search Bar -->
                            <div class="relative w-full max-w-xl mx-auto bg-white rounded-full mb-2">
                                <input placeholder="e.g. Finance" class="rounded-full w-full h-12 bg-transparent py-2 pl-8 pr-32 outline-none border-2 border-gray-100 hover:outline-none focus:ring-teal-200 focus:border-teal-200" type="text" name="query" id="query">
                                <button type="submit" class="bg-blue-500 absolute inline-flex items-center h-8 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none right-2 top-2 bg-teal-600 sm:px-6 sm:text-base sm:font-medium hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                    <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Search
                                </button>
                            </div>
                            <!-- <button class="block w-full px-4 py-2 bg-blue-500 text-white rounded">Button</button> -->

                            <div id="mobile-mega-menu-icons-dropdown" class="absolute right-20 z-10 mt-5 grid hidden min-w-96 grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">PAYMENTS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('payments') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Payments</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Payments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('payments.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Payment</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Payment
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">EXPENSES</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('expenses') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Expenses</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Expenses
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('expenses.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Expense</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Expense
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">WALLET</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('wallets') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Wallets</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Wallets
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('wallets.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Wallet</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Wallet
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">CLIENTS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('clients') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Clients</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Clients
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('clients.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Client</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Client
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">VENDORS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('vendors') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Vendors</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Vendors
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('vendors.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Vendor</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Vendor
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 text-gray-900 dark:text-white">
                                    <h4 class="text-base font-semibold mb-2">CATEGORIES</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('categories') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Categories</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Categories
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('categories.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Category</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Category
                                            </a>
                                        </li>
                                    </ul>
                                    <h4 class="text-base font-semibold mb-2">BILLS</h4>
                                    <ul class="space-y-1 mb-2" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('bills') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">View Bills</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                View Bills
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bills.new') }}" class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only ">Add Bill</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                Add Bill
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <script>
                    document.getElementById('menu-toggle').addEventListener('click', function() {
                        var menu = document.getElementById('mobile-menu');
                        menu.classList.toggle('hidden');
                    });
                </script>

                <!-- <main class="flex-1 overflow-hidden p-8 bg-[#f0f1f6] rounded-3xl">                    
                    <div class="main-content overflow-y-scroll"></div>
                </main> -->

                <main class="flex-1 overflow-hidden p-8 bg-[#f0f1f6] rounded-3xl">
                    <div class="main-content-wrapper h-full overflow-hidden">
                        <div class="main-content h-full overflow-y-auto pr-4 -mr-4">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
            <!-- Right sidebar -->
            <aside class="sidebar w-1/4 md:w-1/4 bg-[#f9fafc] hidden md:block border-l-1 border-[#e1e2eb] px-4 overflow-hidden pb-5">
                <div class="sidebar-wrapper h-full">
                    <div class="relative sidebar-content h-full pr-4 -mr-4">
                        <nav class="border-gray-200 bg-transparent">
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
                                    <div id="dropdownNotification" class="absolute right-20 z-20 hidden w-full max-w-64 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
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
                                    <div class="absolute r-0 z-50 w-48 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
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
                                                <a href="{{ route('logs') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logs</a>
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

                        <div class="h-screen overflow-hidden">
                            <div class="categories-wrapper h-full overflow-hidden">
                                <div class="categories h-5/6 overflow-y-auto pr-4 -mr-4">
                                    <div class="grid grid-cols-2 px-4">
                                        <!-- Wallet Section -->
                                        <div class="flex items-center bg-gray-50 dark:bg-gray-800 w-full h-16">
                                            <h4 class="text-gray-400 dark:text-gray-500">Wallet</h4>
                                        </div>

                                        <!-- Icon Button Section -->
                                        <div class="flex items-center justify-end">
                                            <a href="{{ route('wallets.new') }}" class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-gray-200 border-dashed dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                                                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @if ($walletBalance > 0)
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
                                                    <div class="text-sm text-gray-500">$ {{ $walletBalance }}</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    @else
                                    <p class="p-4">Your wallet is empty!!!</p>
                                    @endif

                                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                                    <div class="grid grid-cols-2 px-4">
                                        <!-- Categories Section -->
                                        <div class="flex items-center bg-gray-50 dark:bg-gray-800 w-full h-16">
                                            <h4 class="text-gray-400 dark:text-gray-500">Categories</h4>
                                        </div>

                                        <!-- Icon Button Section -->
                                        <div class="flex items-center justify-end">
                                            <a href="{{ route('categories.new') }}" class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-gray-200 border-dashed dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                                                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @if (count($categories) > 0)
                                    <ul class="space-y-4 font-medium">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="#" class="flex items-center p-4 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <div class="bg-{{ $category->color }} p-2 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $category->icon }}"/>
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
                                    @else
                                    <p class="p-4">You have no categories.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </aside>
        </div>

        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

        <script src="{{ asset('js/finlit.js') }}" async></script>
        <script src="{{ asset('js/charts.js') }}" async></script>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>
</html>

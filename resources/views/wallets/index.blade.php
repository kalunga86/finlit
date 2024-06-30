<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wallet') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex justify-between items-center">
                <h2 class="text-xl font-bold">Budget List</h2>
                <a href="{{ route('wallets.new') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Wallet
                </a>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                Amount
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Date From
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Date To
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Action
                            </th>
                        </tr>
                    </thead>

                    @if (count($wallets) > 0)
                    <tbody>
                        @foreach($wallets as $wallet)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $wallet['amount'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $wallet['date_from'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $wallet['date_to'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('wallets.edit', $wallet['id']) }}">Edit</a>

                                    <form action="{{ route('wallets.destroy', $wallet['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @else
                            <p class="p-4">You have no Wallets.</p>
                        @endif 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
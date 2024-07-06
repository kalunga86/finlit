<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex justify-between items-center">
                <h2 class="text-xl font-bold">Logs</h2>
                <!-- <a href="{{ route('bills.new') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Bill
                </a> -->
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Activity
                            </th>
                            <th scope="col" class="px-6 py-4">
                                User
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activity)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    {{ (new DateTime($activity->created_at))->format('d F Y') }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="/logs/{{ $activity->id }}">{{ $activity->log_name }}</a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $activity->description;}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/users/{{ $activity->causer_id }}">{{ $activity->user->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
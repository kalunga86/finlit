<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Details') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex justify-between items-center">
                <h2 class="text-xl font-bold">Log Details</h2>
                <!-- <a href="{{ route('bills.new') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Bill
                </a> -->
            </div>

            <div class="relative overflow-x-auto pb-6">
                <table class="table">
                    <tr>
                        <td class="px-6 py-2">ID</td>
                        <td class="px-6 py-2">{{ $log->id }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Activity</td>
                        <td class="px-6 py-2">{{ $log->description }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Log Name</td>
                        <td class="px-6 py-2">{{ $log->log_name }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Event</td>
                        <td class="px-6 py-2">{{ $log->event }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Subject Type</td>
                        <td class="px-6 py-2">{{ $log->subject_type }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Subject ID</td>
                        <td class="px-6 py-2">{{ $log->subject_id }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Causer</td>
                        <td class="px-6 py-2">{{ $log->causer_type }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Causer ID</td>
                        <td class="px-6 py-2">{{ $log->user->name }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Properties</td>
                        <td class="px-6 py-2">
                            <pre>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-2">Created At</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
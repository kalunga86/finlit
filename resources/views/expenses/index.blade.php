<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expenses') }}
        </h2>
    </x-slot>

    <div class="content">
        <div class="overflow-hidden">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Expenses List</h2>
                <a href="{{ route('expenses.new') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Expense
                </a>
            </div>

            <div class="relative overflow-x-auto">

            </div>
        </div>

        @foreach($expenses as $expense)
            <div class="flex flex-wrap items-center bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mt-3">
                <div class="flex items-center space-x-3 p-4 text-gray-900 rounded-lg dark:text-white">
                    <div class="bg-[#F0F1F6] p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22" stroke-width="1" stroke="currentColor" class="size-8  text-{{ $expense->category->color }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $expense->category->icon }}"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-semibold">{{ $expense->category->category_name ?? 'No Category' }}</div>
                        <div class="text-sm text-gray-500">{{ (new DateTime($expense->date))->format('d F Y') }}</div>
                    </div>
                </div>
                <div class="ml-auto flex items-center space-x-3 p-4">
                    <div class="amount p-4 mr-5">{{ $expense->amount }}</div>
                    <div class="action-icons flex items-center">
                        <div class="action-edit bg-blue-100 p-2 rounded-lg mr-4">
                            <a class="" href="{{ route('expenses.edit', $expense->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        </div>
                        <div class="action-delete">
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="custom-pagination flex justify-between items-center mt-4">
            <div>
                <!-- Custom pagination text, if needed -->
                <p class="text-gray-600">Showing {{ $expenses->firstItem() }} to {{ $expenses->lastItem() }} of {{ $expenses->total() }} results</p>
            </div>
            <div>
                {{ $expenses->links('pagination::tailwind') }} <!-- Use the Tailwind pagination view -->
            </div>
        </div>
    </div>
</x-app-layout>
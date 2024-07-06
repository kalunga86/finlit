<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-lg shadow mb-8">
        <div class="flex flex-col md:flex-row">
            <div class="md:basis-2/3 md:flex-grow-0 p-6 md:border-r md:border-dashed md:border-gray-300">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Sales overview</h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <i class="fa fa-arrow-up text-emerald-500"></i>
                        <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="flex-auto">
                    <div class="chart-container">
                        <canvas id="expensesGraph" height="320" width="520" style="display: block; box-sizing: border-box; height: 300px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="md:basis-1/3 md:flex-grow-0 p-6">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <!-- <h6 class="capitalize dark:text-white">Budget</h6> -->
                </div>
                <div class="flex-auto">
                    <div>
                        <canvas id="budgetChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 mt-5">Categories with Biggest Expense</h1>

    <div class="flex flex-wrap space-x-6 space-y-6 sm:space-y-0 px-0 py-4 w-full">
        @foreach($categories as $category)
        <div class="box bg-white p-6 rounded-lg shadow-md flex flex-col items-center flex-1 min-w-[150px] max-w-xs sm:w-1/5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12  text-{{ $category->color }}">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $category->icon }}"/>
            </svg>
            <h3 class="title text-gray-500 text-sm mb-2">{{ $category->category_name }}</h3>
            <p class="price text-gray-800 text-lg">{{ $category->total_expenses }}</p>
        </div>
        @endforeach
    </div>
    
</x-app-layout>

<script>
    var budgetData = @json([$currentMonthExpense, $remainingBudget]);
    var monthlyExpenses = @json($monthlyExpenses);
    var monthlyPayments = @json($monthlyPayments);
</script>
<!-- Include the external JavaScript file -->
<script src="{{ asset('js/charts.js') }}"></script>
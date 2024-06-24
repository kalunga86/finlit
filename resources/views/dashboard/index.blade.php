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
                    <div class="chart-container" style="position: relative; height:40vh; width: auto">
                        <canvas id="chart-line"></canvas>
                    </div>
                </div>
            </div>
            <div class="md:basis-1/3 md:flex-grow-0 p-6">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Budget</h6>
                </div>
                <div class="flex-auto">
                    <div>
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 mt-5">Categories with Biggest Expense</h1>

    <div class="flex flex-wrap space-x-6 space-y-6 sm:space-y-0 px-0 py-4 w-full">
        @foreach($categories as $category)
        <div class="box bg-white p-6 rounded-lg shadow-md flex flex-col items-center flex-1 min-w-[150px] max-w-xs sm:w-1/5">
            <svg class="w-12 h-12 text-gray-800 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
            </svg>
            <h3 class="title text-gray-500 text-sm mb-2">{{ $category->category_name }}</h3>
            <p class="price text-gray-800 text-lg">{{ $category->total_expenses }}</p>
        </div>
        @endforeach
    </div>
    
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Parse the data from PHP to JavaScript
        const monthlyExpenses = @json($monthlyExpenses);

        const data = {
            labels: labels,
            datasets: [{
                label: 'Expenses',
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: monthlyExpenses,
                maxBarThickness: 6
            }]
        };

        const config = {
            type: 'line',
            data: data
        };

        const myChart = new Chart(
            document.getElementById('chart-line'),
            config
        );
    });
</script>
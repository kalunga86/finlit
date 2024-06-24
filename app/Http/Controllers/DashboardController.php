<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Expense;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $categories = $this->getCategoriesWithMonthlyExpense();
        $monthlyExpenses = $this->getMonthlyExpenses();
        return view('dashboard.index', compact('monthlyExpenses', 'categories'));

    }

    public function getMonthlyExpenses()
    {
        // Get the total expenses for each month
        $monthlyExpenses = Expense::select(
                DB::raw('SUM(amount) as total'),
                DB::raw('MONTH(date) as month')
            )
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();
    
        // Initialize an array to store the totals for each month
        $expensesByMonth = array_fill(0, 12, 0);
    
        // Populate the array with the totals from the query
        foreach ($monthlyExpenses as $expense) {
            $expensesByMonth[$expense->month - 1] = $expense->total;
        }
    
        return $expensesByMonth;
    }

    public function getCategoriesWithMonthlyExpense()
    {
        $currentMonth = date('m');

        $categories = DB::table('categories')
            ->leftJoin('expenses', function ($join) use ($currentMonth) {
                $join->on('expenses.category_id', '=', 'categories.id')
                    ->whereRaw('MONTH(expenses.date) = ?', [$currentMonth]);
            })
            ->where('categories.type', 'expense') // Filter categories by type 'expense'
            ->groupBy('categories.category_name')
            ->selectRaw('categories.category_name, COALESCE(SUM(expenses.amount), 0) AS total_expenses')
            ->orderByDesc('total_expenses')
            ->limit(5)
            ->get();
        
        return $categories;
    }
}

<?php
 
namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
 
class WalletComposer
{
    /**
     * Create a new category composer.
     */
    public function __construct() {
        // 
    }
 
    /**
     * Bind data to the view.
     */

    public function compose(View $view): void
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $currentMonthExpenses = DB::table('expenses')
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->where('user_id', auth()->id())
            ->sum('amount');
        
        $currentMonthWallet = DB::table('wallets')
            ->whereMonth('date_from', $currentMonth)
            ->whereYear('date_from', $currentYear)
            ->where('user_id', auth()->id())
            ->sum('amount');

        $walletBalance = $currentMonthWallet - $currentMonthExpenses;

        $view->with('walletBalance', $walletBalance);
    }


    public function getCurrentMonthExpense() {
        
        $currentMonth = date('m');

        $currentMonthExpenses = DB::table('expenses')
            ->whereMonth('date', $currentMonth)
            ->where('user_id', auth()->id())
            ->sum('amount');

        return $currentMonthExpenses;
    }
}
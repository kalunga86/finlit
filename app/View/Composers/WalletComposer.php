<?php
 
namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Wallet;
 
class WalletComposer
{
    /**
     * Create a new wallet composer.
     */
    public function __construct() {
        // 
    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $wallets = Wallet::limit(2)->get();
        $view->with('wallets', $wallets);
    }
}
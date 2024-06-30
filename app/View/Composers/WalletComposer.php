<?php
 
namespace App\View\Composers;

use App\Contracts\FetchWalletsForUserContract;
use Illuminate\View\View;
use App\Models\Wallet;
 
class WalletComposer
{
    protected $query;

    /**
     * WalletComposer constructor.
     *
     * @param FetchWalletsForUserContract $fetchWalletsForUser
     */
    public function __construct(FetchWalletsForUserContract $fetchWalletsForUser)
    {
        $this->query = $fetchWalletsForUser;
    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $wallets = $this->query->handle(
            user: auth()->id(),
        );

        $view->with('wallets', $wallets);
    }
}
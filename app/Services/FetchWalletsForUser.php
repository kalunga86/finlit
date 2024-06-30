<?php

namespace App\Services;

use App\Contracts\FetchWalletsForUserContract;
use App\Models\Wallet;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class FetchWalletsForUser implements FetchWalletsForUserContract
{
    /**
     * Handle fetching accounts for a given user.
     *
     * @param string $user The user ID.
     * @return array The array of wallets.
     */
    public function handle(string $user): Array
    {
        $wallets = Wallet::query()
            ->where('user_id', $user)
            ->get();

        return $wallets->toArray();
    }
}

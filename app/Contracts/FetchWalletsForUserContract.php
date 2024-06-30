<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface FetchWalletsForUserContract
{
    /**
     * Handle fetching accounts for a given user.
     *
     * @param string $user The user ID.
     * @return Array The array of wallets.
     */
    public function handle(string $user): Array;
}

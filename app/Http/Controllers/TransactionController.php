<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Models\Campaign;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function create(CreateTransactionRequest $request)
    {
        $validated = $request->validated();
        $transaction = Transaction::create($validated);
        $campaign = Campaign::find($validated['campaign_id']);
        $campaign->update([
            'donation_amount' => $campaign->donation_amount + $validated['amount'],
            'donation_count' => $campaign->donation_count + 1,
        ]);
        return $this->created($transaction);
    }

    public function index(Campaign $campaign)
    {
        return $this->ok($campaign->transactions);
    }
}

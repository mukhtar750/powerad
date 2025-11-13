@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Payments Ledger (Admin)</h1>

    <div class="bg-white shadow rounded">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Reference</th>
                    <th class="p-3 text-left">Advertiser</th>
                    <th class="p-3 text-left">Billboard</th>
                    <th class="p-3 text-right">Amount (₦)</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                <tr class="border-t">
                    <td class="p-3">{{ $payment->reference }}</td>
                    <td class="p-3">{{ optional($payment->user)->name }}</td>
                    <td class="p-3">{{ optional($payment->billboard)->title }}</td>
                    <td class="p-3 text-right">{{ $payment->formattedAmount() }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-white {{ $payment->status === 'success' ? 'bg-green-600' : ($payment->status === 'failed' ? 'bg-red-600' : 'bg-yellow-600') }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td class="p-3">{{ $payment->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td class="p-3" colspan="6">No payments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $payments->links() }}
    </div>
</div>
@endsection
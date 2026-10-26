<x-filament-panels::page>

<div class="space-y-6">

    {{-- Filter --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div>
            <label class="font-semibold text-sm mb-2 block">
                Company
            </label>

            <select
                wire:model.live="company_id"
                class="w-full rounded-xl border-gray-300 shadow-sm"
            >
                @foreach($this->companies as $company)
                    <option value="{{ $company->id }}">
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>

        </div>

        <div>

            <label class="font-semibold text-sm mb-2 block">
                Period
            </label>

            <select
                wire:model.live="period"
                class="w-full rounded-xl border-gray-300 shadow-sm"
            >
                <option value="daily">Daily</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>

        </div>

        <div>

            <label class="font-semibold text-sm mb-2 block">
                Date
            </label>

            <input
                type="date"
                wire:model.live="date"
                class="w-full rounded-xl border-gray-300 shadow-sm"
            >

        </div>

    </div>

    {{-- KPI CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <div class="text-gray-500 text-sm">
                Income
            </div>

            <div class="mt-2 text-3xl font-bold text-green-600">

                Rp {{ number_format($this->income,0,',','.') }}

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <div class="text-gray-500 text-sm">
                Expense
            </div>

            <div class="mt-2 text-3xl font-bold text-red-600">

                Rp {{ number_format($this->expense,0,',','.') }}

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <div class="text-gray-500 text-sm">
                Profit
            </div>

            <div class="mt-2 text-3xl font-bold text-blue-600">

                Rp {{ number_format($this->profit,0,',','.') }}

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <div class="text-gray-500 text-sm">
                Cash Flow
            </div>

            <div class="mt-2 text-3xl font-bold text-indigo-600">

                Rp {{ number_format($this->cashFlow,0,',','.') }}

            </div>

        </div>

    </div>

    {{-- Transactions --}}
    <div class="bg-white rounded-2xl shadow-sm border">

        <div class="px-6 py-4 border-b">

            <h2 class="font-bold text-lg">
                Transaction Detail
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            Date
                        </th>

                        <th class="px-4 py-3 text-left">
                            Company
                        </th>

                        <th class="px-4 py-3 text-left">
                            Category
                        </th>

                        <th class="px-4 py-3 text-left">
                            Type
                        </th>

                        <th class="px-4 py-3 text-left">
                            Description
                        </th>

                        <th class="px-4 py-3 text-right">
                            Amount
                        </th>

                        <th class="px-4 py-3 text-center">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($this->transactions as $trx)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">
                            {{ $trx->transaction_date->format('d M Y') }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $trx->company->company_name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $trx->category->category_name }}
                        </td>

                        <td class="px-4 py-3">

                            @if($trx->type=='income')

                                <span class="text-green-600 font-semibold">
                                    Income
                                </span>

                            @else

                                <span class="text-red-600 font-semibold">
                                    Expense
                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-3">
                            {{ $trx->description }}
                        </td>

                        <td class="px-4 py-3 text-right font-semibold">

                            Rp {{ number_format($trx->amount,0,',','.') }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ ucfirst($trx->status) }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-10 text-gray-400">

                            No Transaction Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-filament-panels::page>
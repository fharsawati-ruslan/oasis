<x-filament-panels::page>

<div class="space-y-6">

    <div class="grid grid-cols-3 gap-4">

        <div>
            <label>Company</label>
            <select class="w-full rounded-lg border">
                <option>PT Samudra Nusantara Eich</option>
                <option>PT Oasis Agro Solutions</option>
                <option>PT Ertana Nusantara</option>
            </select>
        </div>

        <div>
            <label>Period</label>
            <select class="w-full rounded-lg border">
                <option>Daily</option>
                <option>Monthly</option>
                <option>Yearly</option>
            </select>
        </div>

        <div>
            <label>Date</label>
            <input type="date" class="w-full rounded-lg border">
        </div>

    </div>

    <div class="grid grid-cols-4 gap-4">

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-500">Income</div>
            <div class="text-2xl font-bold text-green-600">
                Rp 0
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-500">Expense</div>
            <div class="text-2xl font-bold text-red-600">
                Rp 0
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-500">Profit</div>
            <div class="text-2xl font-bold text-blue-600">
                Rp 0
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-500">Cash Flow</div>
            <div class="text-2xl font-bold text-indigo-600">
                Rp 0
            </div>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-bold">
            Income vs Expense
        </h3>

        <div class="h-80 flex items-center justify-center text-gray-400">
            Chart Coming Soon
        </div>
    </div>

</div>

</x-filament-panels::page>

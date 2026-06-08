@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-filament-panels::page>

<div class="mb-8">
    <h1 class="text-4xl font-bold text-green-600">
        🌱 Plant Growth Tracker
    </h1>

    <p class="text-gray-500">
        Pantau perkembangan tanaman dari benih hingga panen
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    @foreach($plants as $plant)

        @php

            $cover = $plant->details
                ->whereNotNull('gambar')
                ->last();

            $hari = $plant->details->max('hari') ?? 0;

            $progress = min(
                100,
                round(($hari / 90) * 100)
            );

        @endphp

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <img
                src="{{ $cover ? Storage::url($cover->gambar) : 'https://placehold.co/800x400' }}"
                class="w-full h-64 object-cover"
            >

            <div class="p-4">

                <h2 class="text-xl font-bold">
                    {{ $plant->nama_mitra }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ $plant->alamat }}
                </p>

                <div class="mt-4">

                    <div class="flex justify-between">
                        <span>Progress</span>
                        <span>{{ $progress }}%</span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3 mt-2">
                        <div
                            class="bg-green-500 h-3 rounded-full"
                            style="width: {{ $progress }}%"
                        ></div>
                    </div>

                </div>

                <div class="mt-4 flex gap-2">

                    @foreach($plant->details->take(4) as $detail)

                        @if($detail->gambar)

                            <img
                                src="{{ Storage::url($detail->gambar) }}"
                                class="w-12 h-12 rounded object-cover border"
                            >

                        @endif

                    @endforeach

                </div>

                <div class="mt-4">

                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">

                        H+{{ $hari }}

                    </span>

                </div>

            </div>

        </div>

    @endforeach

</div>

</x-filament-panels::page>
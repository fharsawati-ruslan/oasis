<x-filament-panels::page.simple>

<div class="space-y-6">

    <!-- HEADER -->
    <div class="text-center">

        <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-100 flex items-center justify-center text-4xl mb-4">
            💰
        </div>

        <h1 class="text-3xl font-black text-blue-600">
            CASH MANAGEMENT
        </h1>

        <p class="text-slate-500 text-lg mt-1">
            PT Samudranusantaraeich.id
        </p>

    </div>

    <!-- CLOCK -->
    <div
        x-data="clock()"
        x-init="startClock()"
        class="bg-blue-50 border border-blue-100 rounded-2xl p-5"
    >

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                🕒
            </div>

            <div>

                <div
                    class="text-3xl font-black text-blue-700"
                    x-text="time"
                ></div>

                <div
                    class="text-slate-500"
                    x-text="date"
                ></div>

            </div>

        </div>

    </div>

    <!-- LOGIN FORM -->
    <div class="bg-white rounded-2xl">

        {{ $this->form }}

        <x-filament::button
            type="submit"
            form="form"
            size="xl"
            class="w-full mt-6 h-12 rounded-xl text-lg font-bold bg-blue-600 hover:bg-blue-700"
        >
            Login Dashboard
        </x-filament::button>

    </div>

</div>

<script>
function clock() {
    return {
        time: '',
        date: '',

        startClock() {

            const updateClock = () => {

                const now = new Date()

                this.time = now.toLocaleTimeString('id-ID')

                this.date = now.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                })
            }

            updateClock()

            setInterval(updateClock, 1000)
        }
    }
}
</script>

</x-filament-panels::page.simple>

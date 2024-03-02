<x-slot:title>
    Home
</x-slot:title>

<main class="px-[100px] max-w-4xl mx-auto">
    <div class="flex items-center gap-x-2 py-4">
        <div class="w-full h-[1px] bg-black flex-1"></div>
        <div class="flex items-center">
            <label for="orderby" class="text-[#929292] text-sm font-medium">Urutkan menurut: </label>
            <select name="orderby" id="orderby" wire:model='orderby' class="bg-transparent border-none text-sm font-semibold">
                <option value="terpopuler" selected>Terpopuler</option>
                <option value="terbaru">Terbaru</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        @foreach ($photos as $item)
            <livewire:post-card :data="$item" />
        @endforeach
    </div>
</main>

<x-slot:scripts>
    <script>
        console.log('d');
    </script>
</x-slot:scripts>
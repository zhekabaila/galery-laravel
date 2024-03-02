<x-slot:title>
    Create Album
</x-slot:title>

<main class="px-[100px] mt-12">
    <div class="grid grid-cols-2 gap-x-5">
        <form wire:submit="save()" class="bg-white rounded-md p-8 space-y-6">
            <h2 class="text-2xl font-bold">Buat Album</h2>
            <div class="flex flex-col gap-y-1">
                <label for="nama" class="text-base font-medium">Nama</label>
                <input type="text" wire:model='nama' id="nama" class="bg-white px-2 py-1 border border-primary rounded-md focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('nama') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="deskripsi" class="text-base font-medium">Deskripsi</label>
                <textarea wire:model='deskripsi' id="deskripsi" class="bg-white px-2 py-1 border border-primary rounded-md focus:outline focus:outline-1 focus:outline-primary w-full"></textarea>
                @error('deskripsi') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex">
                <button class="bg-primary text-white text-base font-medium px-12 py-1.5 rounded-md border border-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</main>
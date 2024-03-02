<x-slot:title>
    Upload Photo
</x-slot:title>

<main class="px-[100px] mt-12">
    <div class="grid grid-cols-2 gap-x-5">
        <form wire:submit="save_foto()" class="bg-white rounded-md p-8 space-y-6 basis-1/2">
            <h2 class="text-2xl font-bold">Buat Postingan</h2>
            <div class="flex flex-col gap-y-1">
                <label for="judul" class="text-base font-medium">Judul</label>
                <input type="text" wire:model='judul' class="bg-white px-2 py-1 border border-primary rounded-md focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('judul') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="deskripsi" class="text-base font-medium">Deskripsi</label>
                <textarea wire:model='deskripsi' class="bg-white px-2 py-1 border border-primary rounded-md focus:outline focus:outline-1 focus:outline-primary w-full"></textarea>
                @error('deskripsi') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="album_id" class="text-base font-medium">Album</label>
                <select wire:model='album_id' class="bg-white px-2 py-1.5 border border-primary rounded-md focus:outline focus:outline-1 focus:outline-primary w-full">
                    <option value="" disabled selected>Pilih Album</option>
                    @foreach (App\Models\Album::where('user_id', auth()->user()->id)->get() as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('album_id') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="" class="text-base font-medium">Pilih Foto</label>
                <input type="file" wire:model='lokasi_file' id="lokasi_file" class="bg-white p-2.5 border-2 border-dashed border-primary">
                @error('lokasi_file') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex">
                <button class="bg-primary text-white text-base font-medium px-12 py-1.5 rounded-md border border-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</main>
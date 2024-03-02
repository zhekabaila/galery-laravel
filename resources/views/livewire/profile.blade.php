<x-slot:title>
    My Profile
</x-slot:title>

<main class="px-[100px] mt-12 space-y-20 pb-20">
    <div class="flex justify-center w-full bg-white rounded-md py-8 px-4">
        <form wire:submit="save()" class="flex flex-col items-center gap-y-4 max-w-2xl w-full">
            <div class="flex items-center justify-center size-20 aspect-square bg-mist rounded-md">
                <span class="text-black text-3xl font-bold uppercase">
                    {{ substr(auth()->user()->username, 0, 1) }}
                </span>
            </div>
            <div class="flex flex-col w-full">
                <label for="username" class="text-black text-base font-semibold">username</label>
                <input type="text" wire:model="username" id="username" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('username') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="email" class="text-black text-base font-semibold">email</label>
                <input type="email" wire:model="email" id="email" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('email') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="nama_lengkap" class="text-black text-base font-semibold">nama_lengkap</label>
                <input type="text" wire:model="nama_lengkap" id="nama_lengkap" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('nama_lengkap') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="alamat" class="text-black text-base font-semibold">alamat</label>
                <textarea wire:model="alamat" id="alamat" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary w-full"></textarea>
                @error('alamat') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full">
                <label for="password" class="text-black text-base font-semibold">password</label>
                <input type="password" wire:model="password" id="password" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary w-full">
                @error('password') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-primary text-white text-base font-medium px-4 py-1.5 rounded-md border border-primary w-full">
                Login
            </button>
        </form>
    </div>
    <div class="grid grid-cols-5 gap-4 w-full bg-white rounded-md py-8 px-4">
        @foreach (App\Models\Album::where('user_id', auth()->user()->id)->latest('id')->get() as $item)
            <a href="{{ route('detail.album', $item->id) }}" wire:navigate class="grid grid-cols-2 grid-rows-2 gap-1 p-1 bg-mist rounded-md">
                @foreach ($item->foto()->latest('id')->limit(4)->get() as $foto)
                    <img src="{{ Illuminate\Support\Facades\Storage::url($foto->lokasi_file) }}" alt="" class="rounded-md object-cover size-full object-center aspect-square">
                @endforeach
            </a>
        @endforeach
    </div>
    <div class="grid grid-cols-1 gap-4 w-full max-w-4xl mx-auto rounded-md py-8 px-4">
        @foreach (App\Models\Foto::where('user_id', auth()->user()->id)->latest('id')->get() as $item)
            <livewire:post-card :data="$item" />
        @endforeach
    </div>
</main>

<x-slot:scripts>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.like-image');
        
            images.forEach(image => {
                image.addEventListener('dblclick', function() {
                    const likeIcon = this.parentElement.querySelector('.like-icon');

                    likeIcon.classList.remove('hidden');
                    likeIcon.classList.add('heartBeat');

                    setTimeout(() => {
                        likeIcon.classList.remove('heartBeat');
                        likeIcon.classList.add('hidden');
                    }, 500); 
                });
            });
        });
        </script>
        
</x-slot:scripts>
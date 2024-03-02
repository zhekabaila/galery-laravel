<x-slot:title>
    {{ $foto->judul }}
</x-slot:title>

<main class="px-[100px] max-w-4xl mx-auto my-6">
    <div class="bg-white rounded-md p-3 space-y-[18px]">
        <div class="flex gap-x-3">
            <div class="flex items-center justify-center size-16 bg-mist rounded-md">
                <span class="text-black text-2xl font-bold uppercase">
                    {{ substr($foto->user->username, 0, 1) }}
                </span>
            </div>
            <div class="space-y-0.5">
                <h4 class="text-black text-base font-medium">{{ $foto->user->username }}</h4>
                <time class="block text-black text-xs font-normal">{{ Carbon\Carbon::parse($foto->tanggal)->translatedFormat('d F Y') }}</time>
                <a href="{{ route('detail.album', $foto->album->id) }}" class="text-primary text-xs font-normal hover:underline">{{ $foto->album->nama }}</a>
            </div>
        </div>
        <div class="space-y-2">
            <h5 class="text-black text-base font-medium">{{ $foto->judul }}</h5>
            <p class="text-black text-base font-normal">{{ $foto->deskripsi }}</p>
        </div>
        <div class="bg-mist rounded-md aspect-auto">
            <img src="{{ Illuminate\Support\Facades\Storage::url($foto->lokasi_file) }}" alt="" class="w-full h-auto" wire:dblclick="like({{ $foto->id }})">    
        </div>
        <p class="text-black text-base font-normal">{{ $foto->like()->count() }} likes</p>
        <div class="flex items-center gap-x-10">
            <button type="button" wire:click='like({{ $foto->id }})' class="flex items-center gap-x-1.5">
                @if ($foto->like()->where('user_id', 1)->where('foto_id', $foto->id)->exists())
                    <img src="{{ asset('icons/HiHeart.svg') }}" alt="like icon">
                    <p class="text-heart text-base font-bold">Like</p>
                @else
                    <img src="{{ asset('icons/HiOutlineHeart.svg') }}" alt="like icon">
                    <p class="text-black text-base font-bold">Like</p>
                @endif
            </button>
            <label for="isi_komentar" class="flex items-center gap-x-1.5">
                <img src="{{ asset('icons/HiOutlineChatAlt.svg') }}" alt="comment icon">
                <p class="text-black text-base font-bold">Comment</p>
            </label>
        </div>
        <form wire:submit="save({{ $foto->id }})" class="flex items-center gap-x-3">
            <div class="flex items-center justify-center size-9 aspect-square bg-mist rounded-md">
                <span class="text-black text-base font-bold uppercase">
                    {{ substr(auth()->user()->username, 0, 1) }}
                </span>
            </div>
            <input type="text" wire:model="isi_komentar" id="isi_komentar" class="bg-white border border-primary text-black text-sm font-medium rounded-full px-2.5 py-1 focus:outline focus:outline-1 focus:outline-primary w-full" required>
            <div class="flex">
                <button type="submit" class="flex items-center justify-center bg-primary text-white text-base font-medium p-1.5 rounded-md border border-primary w-full">
                    <img src="{{ asset('icons/HiPaperAirplane.svg') }}" alt="send icon">
                </button>
            </div>
        </form>
        <div id="comment-section" class="my-[18px] space-y-[18px]">
            <h3 class="text-[#7C7C7C] text-center text-base font-medium border-b border-b-[#7C7C7C] pb-2.5">{{ $foto->komentar->count() }} Komentar</h3>
            <div class="flex flex-col gap-y-6">
                @foreach ($foto->komentar()->latest('id')->get() as $komen)
                    <div class="flex gap-x-3">
                        <div class="flex items-center justify-center size-12 mt-1 aspect-square bg-mist rounded-md">
                            <span class="text-black text-base font-bold uppercase">
                                {{ substr($komen->user->username, 0, 1) }}
                            </span>
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center gap-x-2">
                                <h4 class="text-black text-lg font-medium">{{ $komen->user->username }}</h4>
                                <time class="text-black text-xs font-extralight">{{ Carbon\Carbon::parse($komen->tanggal)->translatedFormat('d F Y') }}</time>
                            </div>
                            <p class="text-black text-base font-normal">
                                {{ $komen->isi_komentar }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
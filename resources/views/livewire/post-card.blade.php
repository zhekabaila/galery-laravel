<div class="bg-white rounded-md p-3 space-y-[18px]">
    <div class="flex gap-x-3">
        <div class="flex items-center justify-center size-16 bg-mist rounded-md">
            <span class="text-black text-2xl font-bold uppercase">
                {{ substr($data->user->username, 0, 1) }}
            </span>
        </div>
        <div class="space-y-0.5">
            <h4 class="text-black text-base font-medium">{{ $data->user->username }}</h4>
            <time class="block text-black text-xs font-normal">{{ Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</time>
            <a href="{{ route('detail.album', $data->album->id) }}" wire:navigate class="text-primary text-xs font-normal hover:underline">
                {{ $data->album->nama }}
            </a>
        </div>
    </div>
    <div class="space-y-2">
        <h5 class="text-black text-base font-medium">{{ $data->judul }}</h5>
        <p class="text-black text-base font-normal">{{ $data->deskripsi }}</p>
    </div>
    <div class="bg-mist rounded-md aspect-auto">
        <img src="{{ Illuminate\Support\Facades\Storage::url($data->lokasi_file) }}" alt="" class="w-full h-auto" wire:dblclick="like({{ $data->id }})">    
    </div>
    <p class="text-black text-base font-normal">{{ $data->like()->count() }} likes</p>
    <div class="flex items-center gap-x-10">
        <button type="button" wire:click='like({{ $data->id }})' class="flex items-center gap-x-1.5">
            @if ($data->like()->where('user_id', 1)->where('foto_id', $data->id)->exists())
                <img src="{{ asset('icons/HiHeart.svg') }}" alt="like icon">
                <p class="text-heart text-base font-bold">Like</p>
            @else
                <img src="{{ asset('icons/HiOutlineHeart.svg') }}" alt="like icon">
                <p class="text-black text-base font-bold">Like</p>
            @endif
        </button>
        <a href="{{ route('detail.foto', $data->id) }}" wire:navigate class="flex items-center gap-x-1.5">
            <img src="{{ asset('icons/HiOutlineChatAlt.svg') }}" alt="comment icon">
            <p class="text-black text-base font-bold">Comment</p>
        </a>
    </div>
</div>
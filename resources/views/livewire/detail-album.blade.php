<x-slot:title>
    {{ App\Models\Album::find(request('id'))->nama }}
</x-slot:title>

<main class="px-[100px] my-6">
    <div class="bg-white rounded-md p-3 space-y-12">
        <h2 class="text-black text-2xl font-semibold">{{ App\Models\Album::find(request('id'))->nama }}</h2>
        <div class="grid grid-cols-5 gap-8">
            @foreach ($photos as $item)
                <a href="{{ route('detail.foto', $item->id) }}" wire:navigate class="bg-mist rounded-md aspect-square">
                    <img src="{{ Illuminate\Support\Facades\Storage::url($item->lokasi_file) }}" class="aspect-square object-cover size-full rounded-md" alt="">
                </a>
            @endforeach
        </div>
    </div>
</main>
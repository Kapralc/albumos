@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-center items-center mb-4">
        <h1 class="text-2xl font-bold border px-4 py-2 rounded">Galerie fotek</h1>
    </div>

    {{-- Tlačítko pro přidání nové fotky --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('photos.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded shadow hover:bg-blue-600">
            Přidat fotku
        </a>
    </div>

    {{-- Filtrování podle názvu --}}
    <div class="flex justify-center mb-6">
        <form action="{{ route('photos.index') }}" method="GET" class="w-full max-w-sm">
            <div class="flex items-center border rounded">
                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Hledat podle názvu..." class="w-full px-4 py-2 border-r rounded-l focus:outline-none">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r hover:bg-blue-600">Hledat</button>
            </div>
        </form>
    </div>

    {{-- Zobrazení úspěšné zprávy --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 max-w-xs mx-auto">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mřížka fotek --}}
    <div class="grid grid-cols-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($photos as $photo)
            <div class="flex flex-col items-center space-y-2">
                {{-- Obrázek --}}
                <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->title }}" class="w-20% h-[300px] object-cover rounded-lg shadow-lg">
                
                {{-- Titulek obrázku --}}
                <div class="bg-black bg-opacity-75 text-white text-center text-sm px-4 py-2 rounded w-300px">
                    {{ $photo->title }}
                </div>
                
                {{-- Tlačítko pro smazání fotky --}}
                <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded shadow hover:bg-red-600 w-full">
                        Smazat
                    </button>
                </form>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Zatím nejsou žádné fotky.</p>
        @endforelse
    </div>
</div>
@endsection

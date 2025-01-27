@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    {{-- Nadpis --}}
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Přidat novou fotku</h1>

    {{-- Zobrazení chyb --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6 max-w-lg mx-auto shadow">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulář pro přidání fotky --}}
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf

        {{-- Název fotky --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Název fotky</label>
            <input type="text" id="title" name="title" 
                   class="w-30% p-3 border border-gray-300 rounded focus:ring focus:ring-blue-300 focus:outline-none" 
                   required>
        </div>

        {{-- Nahrání souboru --}}
        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Vyber fotku</label>
            <input type="file" id="photo" name="photo" accept="image/*" 
                   class="w-30% p-3 border border-gray-300 rounded focus:ring focus:ring-blue-300 focus:outline-none" 
                   required>
        </div>

        {{-- Náhled fotky --}}
        @if (isset($photoPreview))
            <div class="mt-6 text-center">
                <img src="{{ $photoPreview }}" alt="Náhled fotky" class="max-w-full h-auto rounded shadow">
            </div>
        @endif

        {{-- Tlačítko pro odeslání --}}
        <div class="text-center">
            <button type="submit" 
                    class="bg-blue-500 text-black px-6 py-3 rounded shadow hover:bg-blue-600 focus:ring focus:ring-blue-300">
                Nahrát fotku
            </button>
        </div>
    </form>
</div>
@endsection
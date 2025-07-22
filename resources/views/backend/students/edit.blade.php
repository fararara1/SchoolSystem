@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow-lg rounded-2xl mt-8">
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800">✏️ Modifier l'étudiant</h2>
        <a href="{{ route('student.index') }}" class="inline-flex items-center gap-2 text-sm bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
            </svg>
            Retour
        </a>
    </div>

    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Nom</label>
            <input name="name" type="text" value="{{ $student->user->name }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Email</label>
            <input name="email" type="email" value="{{ $student->user->email }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Numéro d'inscription --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Numéro d'inscription</label>
            <input name="roll_number" type="number" value="{{ $student->roll_number }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('roll_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Téléphone --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Téléphone</label>
            <input name="phone" type="text" value="{{ $student->phone }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Genre --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Genre</label>
            <div class="flex gap-6">
                <label class="flex items-center text-gray-600">
                    <input type="radio" name="gender" value="male" {{ $student->gender == 'male' ? 'checked' : '' }} class="mr-2">
                    Homme
                </label>
                <label class="flex items-center text-gray-600">
                    <input type="radio" name="gender" value="female" {{ $student->gender == 'female' ? 'checked' : '' }} class="mr-2">
                    Femme
                </label>
            </div>
            @error('gender') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Date de naissance --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Date de naissance</label>
            <input name="dateofbirth" type="text" id="datepicker-se" value="{{ $student->dateofbirth }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('dateofbirth') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Adresse actuelle --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Adresse actuelle</label>
            <input name="current_address" type="text" value="{{ $student->current_address }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400">
            @error('current_address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Photo --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Photo</label>
            <input name="profile_picture" type="file" class="w-full px-4 py-2 border rounded-lg bg-gray-50">
            @error('profile_picture') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Bouton --}}
        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow">
                ✅ Enregistrer les modifications
            </button>
        </div>
    </form>
</div>
@endsection

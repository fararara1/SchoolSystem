@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-semibold text-indigo-700 uppercase">Ajouter un enseignant</h2>
        <a href="{{ route('teacher.index') }}" class="inline-flex items-center bg-indigo-600 text-white text-sm font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition">
            <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 448 512">
                <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
            </svg>
            Retour
        </a>
    </div>

    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Nom --}}
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-2">Nom</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nom complet" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="exemple@mail.com" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Mot de passe --}}
        <div>
            <label for="password" class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
            <input id="password" name="password" type="password" placeholder="••••••••" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Téléphone --}}
        <div>
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Téléphone</label>
            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="+212 6 XX XX XX XX" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Genre --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Genre</label>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="male" class="form-radio text-indigo-600" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Homme</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="female" class="form-radio text-indigo-600" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Femme</span>
                </label>
            </div>
            @error('gender')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Date de naissance --}}
        <div>
            <label for="dateofbirth" class="block text-gray-700 font-semibold mb-2">Date de naissance</label>
            <input id="dateofbirth" name="dateofbirth" type="date" value="{{ old('dateofbirth') }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('dateofbirth')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Adresse actuelle --}}
        <div>
            <label for="current_address" class="block text-gray-700 font-semibold mb-2">Adresse actuelle</label>
            <input id="current_address" name="current_address" type="text" value="{{ old('current_address') }}" placeholder="Adresse actuelle" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('current_address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Adresse permanente --}}
        <div>
            <label for="permanent_address" class="block text-gray-700 font-semibold mb-2">Adresse permanente</label>
            <input id="permanent_address" name="permanent_address" type="text" value="{{ old('permanent_address') }}" placeholder="Adresse permanente" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500">
            @error('permanent_address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Photo --}}
        <div>
            <label for="profile_picture" class="block text-gray-700 font-semibold mb-2">Photo</label>
            <input id="profile_picture" name="profile_picture" type="file" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-2 focus:ring-indigo-500">
            @error('profile_picture')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bouton --}}
        <div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition">Enregistrer</button>
        </div>
    </form>
</div>
@endsection

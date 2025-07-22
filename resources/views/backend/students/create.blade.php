@extends('layouts.app')

@section('content')
<div class="roles max-w-3xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-gray-700 uppercase font-bold text-xl">Ajouter un nouvel élève</h2>
        <a href="{{ route('student.index') }}" class="bg-gray-700 text-white text-xs uppercase py-2 px-4 flex items-center rounded hover:bg-gray-800 transition">
            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
            </svg>
            <span class="ml-2 font-semibold">Retour</span>
        </a>
    </div>

    <form action="{{ route('student.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf 
        {{-- Nom --}}
<div class="md:flex md:items-center">
    <label for="name" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Nom complet</label>
    <div class="md:w-2/3">
        <input id="name" name="name" type="text" value="{{ old('name') }}"
            class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        @error('name')
            <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Numéro d’inscription (Roll Number) --}}
<div class="md:flex md:items-center">
    <label for="roll_number" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Numéro d'inscription</label>
    <div class="md:w-2/3">
        <input id="roll_number" name="roll_number" type="text" value="{{ old('roll_number') }}"
            class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        @error('roll_number')
            <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- Date de naissance --}}
<div class="md:flex md:items-center">
    <label for="dateofbirth" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Date de naissance</label>
    <div class="md:w-2/3">
        <input id="dateofbirth" name="dateofbirth" type="date" value="{{ old('dateofbirth') }}"
            class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        @error('dateofbirth')
            <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
        @enderror
    </div>
</div>


        {{-- Email --}}
        <div class="md:flex md:items-center">
            <label for="email" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Email</label>
            <div class="md:w-2/3">
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Password --}}
        <div class="md:flex md:items-center">
            <label for="password" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Mot de passe</label>
            <div class="md:w-2/3">
                <input id="password" name="password" type="password"
                    class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Phone --}}
        <div class="md:flex md:items-center">
            <label for="phone" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Téléphone</label>
            <div class="md:w-2/3">
                <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                    class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('phone')
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Gender --}}
        <div class="md:flex md:items-center">
            <label class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Genre</label>
            <div class="md:w-2/3 flex items-center space-x-6">
                <label class="flex items-center text-gray-700 font-medium">
                    <input type="radio" name="gender" value="male" class="mr-2" {{ old('gender') == 'male' ? 'checked' : '' }}> Homme
                </label>
                <label class="flex items-center text-gray-700 font-medium">
                    <input type="radio" name="gender" value="female" class="mr-2" {{ old('gender') == 'female' ? 'checked' : '' }}> Femme
                </label>
            </div>
            @error('gender')
                <p class="md:ml-[33.333%] text-red-500 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Profile Picture --}}
        <div class="md:flex md:items-center">
            <label for="profile_picture" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Photo</label>
            <div class="md:w-2/3">
                <input id="profile_picture" name="profile_picture" type="file"
                    class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('profile_picture')
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Current Address --}}
        <div class="md:flex md:items-center">
            <label for="current_address" class="md:w-1/3 text-right font-semibold text-gray-600 pr-6">Adresse actuelle</label>
            <div class="md:w-2/3">
                <input id="current_address" name="current_address" type="text" value="{{ old('current_address') }}"
                    class="w-full border rounded px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('current_address')
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Submit --}}
        <div class="md:flex">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button type="submit"
                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

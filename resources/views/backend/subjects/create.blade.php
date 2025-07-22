@extends('layouts.app')

@section('content')
    <div class="roles max-w-3xl mx-auto px-6 py-10 bg-gray-50 rounded-lg shadow-lg">

        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl text-indigo-700 font-extrabold uppercase tracking-wide">Ajouter une nouvelle matière</h2>
            <a href="{{ route('subject.index') }}" class="flex items-center space-x-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm uppercase py-2 px-5 rounded-lg shadow-md transition">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                </svg>
                <span class="font-semibold">Retour</span>
            </a>
        </div>

        <form action="{{ route('subject.store') }}" method="POST" class="space-y-8 bg-white p-8 rounded-xl shadow-md">
            @csrf

            <div class="flex flex-col md:flex-row md:items-center">
                <label class="md:w-1/3 text-gray-700 font-semibold mb-2 md:mb-0 md:text-right pr-6" for="name">
                    Nom de la matière
                </label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                    class="md:w-2/3 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 shadow-sm"
                    placeholder="Entrez le nom de la matière">
            </div>
            @error('name')
                <p class="text-red-600 text-sm md:pl-1 md:ml-auto md:w-2/3">{{ $message }}</p>
            @enderror

            <div class="flex flex-col md:flex-row md:items-center">
                <label class="md:w-1/3 text-gray-700 font-semibold mb-2 md:mb-0 md:text-right pr-6" for="subject_code">
                    Code de la matière
                </label>
                <input id="subject_code" name="subject_code" type="number" value="{{ old('subject_code') }}"
                    class="md:w-2/3 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 shadow-sm"
                    placeholder="Entrez le code de la matière">
            </div>
            @error('subject_code')
                <p class="text-red-600 text-sm md:pl-1 md:ml-auto md:w-2/3">{{ $message }}</p>
            @enderror

            <div class="flex flex-col md:flex-row md:items-center">
                <label class="md:w-1/3 text-gray-700 font-semibold mb-2 md:mb-0 md:text-right pr-6" for="description">
                    Description
                </label>
                <input id="description" name="description" type="text" value="{{ old('description') }}"
                    class="md:w-2/3 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 shadow-sm"
                    placeholder="Description de la matière">
            </div>
            @error('description')
                <p class="text-red-600 text-sm md:pl-1 md:ml-auto md:w-2/3">{{ $message }}</p>
            @enderror

            <div class="flex flex-col md:flex-row md:items-center">
                <label class="md:w-1/3 text-gray-700 font-semibold mb-2 md:mb-0 md:text-right pr-6" for="teacher_id">
                    Enseignant responsable
                </label>
                <select id="teacher_id" name="teacher_id"
                    class="md:w-2/3 bg-white border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 shadow-sm">
                    <option value="">-- Sélectionner un enseignant --</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('teacher_id')
                <p class="text-red-600 text-sm md:pl-1 md:ml-auto md:w-2/3">{{ $message }}</p>
            @enderror

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection

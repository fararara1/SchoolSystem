@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 uppercase tracking-wide">Modifier classe</h2>
        <a href="{{ route('classes.index') }}" 
           class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded transition duration-300">
            <svg class="w-4 h-4 mr-2 fill-current" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
            </svg>
            Retour
        </a>
    </div>

    <form action="{{ route('classes.update', $class->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="class_name" class="block mb-2 font-semibold text-gray-700">Nom de la classe</label>
            <input id="class_name" name="class_name" type="text" value="{{ old('class_name', $class->class_name) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Entrez le nom de la classe" />
            @error('class_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="class_numeric" class="block mb-2 font-semibold text-gray-700">Numéro de la classe</label>
            <input id="class_numeric" name="class_numeric" type="number" value="{{ old('class_numeric', $class->class_numeric) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Entrez le numéro de la classe" />
            @error('class_numeric')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="teacher_id" class="block mb-2 font-semibold text-gray-700">Professeur assigné</label>
            <select id="teacher_id" name="teacher_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Sélectionnez un professeur --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == old('teacher_id', $class->teacher_id) ? 'selected' : '' }}>
                        {{ $teacher->user->name }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="class_description" class="block mb-2 font-semibold text-gray-700">Description de la classe</label>
            <input id="class_description" name="class_description" type="text" value="{{ old('class_description', $class->class_description) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Entrez une description" />
            @error('class_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" 
                class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded shadow transition duration-300">
                Modifier classe
            </button>
        </div>
    </form>
</div>
@endsection

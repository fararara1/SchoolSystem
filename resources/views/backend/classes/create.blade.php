@extends('layouts.app')

@section('content')
<div class="roles">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-purple-900 uppercase font-extrabold tracking-wide text-lg">Ajouter une nouvelle classe</h2>
        </div>
        <div class="flex flex-wrap items-center">
            <a href="{{ route('classes.index') }}" class="bg-purple-800 text-white text-sm uppercase py-2 px-4 flex items-center rounded shadow-md hover:bg-purple-700 transition duration-300">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 239.03L313.515 59.515c12.496-12.497 32.758-12.497 45.255 0l22.627 22.627c12.497 12.497 12.497 32.758 0 45.255L234.627 256l146.77 128.603c12.497 12.497 12.497 32.758 0 45.255l-22.627 22.627c-12.497 12.497-32.758 12.497-45.255 0L134.059 273.97c-9.373-9.372-9.373-24.568 0-34.94z"/></svg>
                <span class="ml-2 text-xs font-semibold">Retour</span>
            </a>
        </div>
    </div>

    <div class="table w-full mt-8 bg-gradient-to-r from-purple-100 via-purple-50 to-purple-100 rounded-lg shadow-lg p-8 max-w-xl mx-auto">
        <form action="{{ route('classes.store') }}" method="POST" class="w-full">
            @csrf

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="class_name" class="block text-purple-800 font-semibold md:text-right mb-2 md:mb-0 pr-4">
                        Nom de la classe
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="class_name" name="class_name" class="bg-white appearance-none border-2 border-purple-300 rounded w-full py-2 px-4 text-purple-900 leading-tight focus:outline-none focus:bg-white focus:border-purple-600 transition duration-200" type="text" value="{{ old('class_name') }}">
                    @error('class_name')
                        <p class="text-red-600 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Nouveau champ class_numeric -->
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="class_numeric" class="block text-purple-800 font-semibold md:text-right mb-2 md:mb-0 pr-4">
                        Numéro de la classe
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="class_numeric" name="class_numeric" class="bg-white appearance-none border-2 border-purple-300 rounded w-full py-2 px-4 text-purple-900 leading-tight focus:outline-none focus:bg-white focus:border-purple-600 transition duration-200" type="number" min="1" value="{{ old('class_numeric') }}">
                    @error('class_numeric')
                        <p class="text-red-600 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="teacher_id" class="block text-purple-800 font-semibold md:text-right mb-2 md:mb-0 pr-4">
                        Enseignant responsable
                    </label>
                </div>
                <div class="md:w-2/3">
                    <div class="relative">
                        <select id="teacher_id" name="teacher_id" class="block appearance-none w-full bg-white border border-purple-300 text-purple-900 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-purple-600 transition duration-200" id="grid-state">
                            <option value="">--Sélectionner un enseignant--</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-purple-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 7l3-3 3 3m0 6l-3 3-3-3"/></svg>
                        </div>
                    </div>
                    @error('teacher_id')
                        <p class="text-red-600 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="class_description" class="block text-purple-800 font-semibold md:text-right mb-2 md:mb-0 pr-4">
                        Description de la classe
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="class_description" name="class_description" class="bg-white appearance-none border-2 border-purple-300 rounded w-full py-2 px-4 text-purple-900 leading-tight focus:outline-none focus:bg-white focus:border-purple-600 transition duration-200" type="text" value="{{ old('class_description') }}">
                    @error('class_description')
                        <p class="text-red-600 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="shadow-lg bg-purple-600 hover:bg-purple-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded transition duration-300" type="submit">
                        Enregistrer
                    </button>
                </div>
            </div>
        </form>        
    </div>
</div>
@endsection

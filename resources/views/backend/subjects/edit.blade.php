@extends('layouts.app')

@section('content')
    <div class="roles max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-8 border-b pb-3">
            <h2 class="text-xl font-semibold text-gray-800 uppercase">Modifier Matière</h2>
            <a href="{{ route('subject.index') }}" 
               class="inline-flex items-center bg-gray-700 text-white text-sm uppercase py-2 px-4 rounded hover:bg-gray-800 transition">
                <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path>
                </svg>
                <span class="ml-2 font-semibold">Retour</span>
            </a>
        </div>

        <form action="{{ route('subject.update', $subject->id) }}" method="POST" class="space-y-6 max-w-xl mx-auto">
            @csrf
            @method('PUT')

            <div class="md:flex md:items-center">
                <label class="md:w-1/3 text-gray-700 font-bold md:text-right pr-4">Nom du matière</label>
                <input name="name" type="text" value="{{ $subject->name }}"
                    class="md:w-2/3 bg-gray-100 border border-gray-300 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('name')
                    <p class="md:w-2/3 md:ml-auto text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:flex md:items-center">
                <label class="md:w-1/3 text-gray-700 font-bold md:text-right pr-4">Code de matière</label>
                <input name="subject_code" type="number" value="{{ $subject->subject_code }}"
                    class="md:w-2/3 bg-gray-100 border border-gray-300 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('subject_code')
                    <p class="md:w-2/3 md:ml-auto text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:flex md:items-center">
                <label class="md:w-1/3 text-gray-700 font-bold md:text-right pr-4">Description</label>
                <input name="description" type="text" value="{{ $subject->description }}"
                    class="md:w-2/3 bg-gray-100 border border-gray-300 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('description')
                    <p class="md:w-2/3 md:ml-auto text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:flex md:items-center">
                <label class="md:w-1/3 text-gray-700 font-bold md:text-right pr-4">Professeur assigné</label>
                <div class="md:w-2/3">
                    <select name="teacher_id"
                        class="block w-full bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Sélectionner un professeur --</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id === $subject->teacher_id ? 'selected' : '' }}>
                                {{ $teacher->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition">
                        Mettre à jour la matière
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

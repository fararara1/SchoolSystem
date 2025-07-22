@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700 uppercase">Classes</h2>
        <a href="{{ route('classes.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center">
            <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
            Ajouter une classe
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-800 text-white uppercase text-sm">
                    <th class="px-5 py-3 text-left">#</th>
                    <th class="px-5 py-3 text-left">Nom</th>
                    <th class="px-5 py-3 text-left">Élèves</th>
                    <th class="px-5 py-3 text-left">Enseignant</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-5 py-3 text-sm text-gray-700 font-semibold">{{ $class->class_numeric }}</td>
                    <td class="px-5 py-3 text-sm text-gray-700 font-semibold">{{ $class->class_name }}</td>
                    <td class="px-5 py-3 text-sm text-gray-700">
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $class->students_count }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-sm text-gray-700 font-semibold">{{ $class->teacher->user->name ?? '' }}</td>
                    <td class="px-5 py-3 text-sm text-right space-x-2">
                        <a href="{{ route('classes.edit', $class->id) }}" class="text-green-600 hover:text-green-800" title="Modifier">
                            <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"/></svg>
                        </a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cette classe ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></svg>
                            </button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $classes->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="roles-permissions max-w-7xl mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-extrabold text-gray-800 uppercase">Étudiants</h2>
        <a href="{{ route('student.create') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white text-sm uppercase font-semibold py-2 px-5 rounded shadow transition">
            <svg class="w-4 h-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>
            Ajouter
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white uppercase text-sm font-semibold">
                <tr>
                    <th class="px-6 py-3 text-left w-3/12">Nom</th>
                    <th class="px-6 py-3 text-left w-3/12">Email</th>
                    
                    <th class="px-6 py-3 text-left w-2/12">Téléphone</th>
                    <th class="px-6 py-3 text-right w-2/12">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
                @foreach ($students as $student)
                    <tr class="hover:bg-gray-50">
                    <td>{{ $student->user ? $student->user->name : 'Utilisateur non défini' }}</td>

                        <td class="px-6 py-4">{{ $student->user  ? $student->user->email : 'Utilisateur non défini' }}</td>
                      

                        <td class="px-6 py-4">{{ $student->phone }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('student.edit', $student->id) }}" class="inline-block p-2 text-green-600 hover:bg-green-100 rounded transition" title="Modifier">
                                <svg class="h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"/></svg>
                            </a>
                            <button data-url="{{ route('student.destroy', $student->id) }}" class="deletebtn inline-block p-2 bg-red-600 hover:bg-red-700 text-white rounded transition" title="Supprimer">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $students->links() }}
    </div>

    @include('backend.modals.delete', ['name' => 'student'])
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $(".deletebtn").on("click", function(event) {
            event.preventDefault();
            $("#deletemodal").toggleClass("hidden");
            var url = $(this).data('url');
            $(".remove-record").attr("action", url);
        });
        $("#deletemodelclose").on("click", function(event) {
            event.preventDefault();
            $("#deletemodal").toggleClass("hidden");
        });
    });
</script>
@endpush

<style>
    .container-student-info {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        padding: 30px 35px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2c3e50;
    }
    .flex-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        justify-content: space-between;
    }
    .student-info {
        flex: 1 1 420px;
        background: #f4f6f8;
        border-radius: 14px;
        padding: 28px 30px;
        box-shadow: inset 0 0 12px rgba(0,0,0,0.05);
    }
    .student-info h2 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 22px;
        color: #34495e;
        border-bottom: 2px solid #3498db;
        padding-bottom: 6px;
        user-select: none;
    }
    .info-row {
        display: flex;
        margin-bottom: 18px;
    }
    .info-label {
        width: 35%;
        font-weight: 600;
        color: #7f8c8d;
    }
    .info-value {
        width: 65%;
        font-weight: 500;
        color: #2c3e50;
        word-break: break-word;
    }
    .notes-section {
        flex: 1 1 440px;
        background: #f4f6f8;
        border-radius: 14px;
        box-shadow: inset 0 0 12px rgba(0,0,0,0.05);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        max-height: 480px;
    }
    .notes-section h2 {
        font-size: 1.5rem;
        font-weight: 700;
        background-color: #3498db;
        color: white;
        margin: 0;
        padding: 16px 24px;
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
        user-select: none;
    }
    .notes-table-wrapper {
        overflow-y: auto;
        flex-grow: 1;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95rem;
        color: #34495e;
    }
    thead tr {
        background-color: #d6e9ff;
        position: sticky;
        top: 0;
        z-index: 1;
    }
    thead th {
        padding: 12px 16px;
        text-align: left;
        font-weight: 600;
        border-bottom: 2px solid #3498db;
    }
    tbody tr {
        border-bottom: 1px solid #ccc;
        transition: background-color 0.2s ease;
    }
    tbody tr:hover {
        background-color: #e8f0fe;
    }
    tbody td {
        padding: 12px 16px;
        vertical-align: middle;
    }
    tbody td.font-semibold {
        font-weight: 700;
        color: #2980b9;
    }
    @media (max-width: 768px) {
        .flex-row {
            flex-direction: column;
        }
        .student-info, .notes-section {
            flex: 1 1 100%;
            max-height: none;
        }
        .notes-section {
            margin-top: 30px;
        }
    }
</style>

<div class="container-student-info">

    <div class="flex-row">

        {{-- Infos étudiant --}}
        <div class="student-info">
            <h2>👤 Informations personnelles</h2>

            <div class="info-row">
                <div class="info-label">🧑 Nom :</div>
                <div class="info-value">{{ $student->user->name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">📧 Email :</div>
                <div class="info-value">{{ $student->user->email }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">🆔 Numéro d'inscription :</div>
                <div class="info-value">{{ $student->roll_number }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">📞 Téléphone :</div>
                <div class="info-value">{{ $student->phone }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">⚧ Genre :</div>
                <div class="info-value">{{ $student->gender }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">🎂 Date de naissance :</div>
                <div class="info-value">{{ $student->dateofbirth }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">🏠 Adresse actuelle :</div>
                <div class="info-value">{{ $student->current_address }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">📱 Téléphone du parent :</div>
                <div class="info-value">{{ $student->parent->phone ?? 'Non renseigné' }}</div>
            </div>
        </div>

        {{-- Notes --}}
        <div class="notes-section">
            <h2>📝 Notes</h2>
            <div class="notes-table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>👨‍🎓 Étudiant</th>
                            <th>⭐ Note</th>
                            <th>📅 Évaluation</th>
                            <th>📚 Matière</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student->notes as $note)
                            <tr>
                                <td>{{ $note->student->user->name ?? 'Étudiant supprimé' }}</td>
                                <td class="font-semibold">{{ $note->note }}</td>
                                <td>{{ $note->evaluation->nom ?? 'Évaluation supprimée' }}</td>
                                <td>{{ $note->evaluation->matiere ?? 'Matière non définie' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center; color:#7f8c8d; padding: 20px;">Aucune note disponible</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

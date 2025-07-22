<div class="sidebar hidden sm:block w-0 sm:w-1/6 bg-gray-100 h-screen shadow-xl fixed top-0 left-0 bottom-0 z-40 overflow-y-auto border-r border-gray-300">
  <div class="mb-6 mt-20 px-6">
    <a href="{{ route('home') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-blue-200 hover:text-blue-700 transition-colors duration-300">
      <span class="text-lg mr-3">🏠</span>
      <span class="text-sm font-semibold">Tableau de bord</span>
    </a>

    @role('Admin')
    <a href="{{ route('teacher.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-orange-200 hover:text-orange-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">👩‍🏫</span>
      <span class="text-sm font-semibold">Enseignants</span>
    </a>

    <a href="{{ route('subject.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-purple-200 hover:text-purple-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">📚</span>
      <span class="text-sm font-semibold">Matières</span>
    </a>

    <a href="{{ route('classes.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-green-200 hover:text-green-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">🏫</span>
      <span class="text-sm font-semibold">Classes</span>
    </a>

    <a href="{{ route('niveaux.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-yellow-200 hover:text-yellow-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">🔵</span>
      <span class="text-sm font-semibold">Niveaux</span>
    </a>

    <a href="{{ route('student.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-pink-200 hover:text-pink-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">👨‍🎓</span>
      <span class="text-sm font-semibold">Étudiants</span>
    </a>

    <a href="{{ route('notes.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-red-200 hover:text-red-700 transition-colors duration-300 mt-2">
      <span class="text-lg mr-3">📝</span>
      <span class="text-sm font-semibold">Note des étudiants</span>
    </a>
    @endrole

    @role('Teacher')
    <a href="{{ route('evaluations.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-teal-200 hover:text-teal-700 transition-colors duration-300 mt-2">
        <span class="text-lg mr-3">📈</span>
        <span class="text-sm font-semibold">Évaluations</span>
    </a>

    <a href="{{ route('groups.index') }}" class="flex items-center py-3 rounded-lg text-gray-700 hover:bg-red-200 hover:text-red-700 transition-colors duration-300 mt-2">
        <span class="text-lg mr-3">👨‍🏫</span>
        <span class="text-sm font-semibold">Groupes</span>
    </a>
@endrole


  </div>
</div>

<div class="w-full block mt-8">
  <div class="flex flex-wrap sm:flex-no-wrap justify-between gap-x-10 gap-y-10">
    <div class="w-44 h-44 bg-blue-100 border-6 border-blue-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-blue-700 font-bold text-6xl">{{ sprintf("%02d", count($students)) }}</span>
      <span class="text-blue-700 uppercase mt-3 font-semibold text-center text-xl">Étudiants</span>
    </div>
    <div class="w-44 h-44 bg-orange-100 border-6 border-orange-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-orange-700 font-bold text-6xl">{{ sprintf("%02d", count($teachers)) }}</span>
      <span class="text-orange-700 uppercase mt-3 font-semibold text-center text-xl">Enseignants</span>
    </div>
    <div class="w-44 h-44 bg-green-100 border-6 border-green-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-green-700 font-bold text-6xl">{{ sprintf("%02d", count($parents)) }}</span>
      <span class="text-green-700 uppercase mt-3 font-semibold text-center text-xl">Parents</span>
    </div>
  </div>
</div>

<div class="w-full block mt-10">
  <div class="flex flex-wrap sm:flex-no-wrap justify-between gap-x-10 gap-y-10">
    <div class="w-44 h-44 bg-cyan-100 border-6 border-cyan-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-cyan-700 font-bold text-6xl">{{ sprintf("%02d", count($niveaux)) }}</span>
      <span class="text-cyan-700 uppercase mt-3 font-semibold text-center text-xl">Niveaux</span>
    </div>
    <div class="w-44 h-44 bg-red-100 border-6 border-red-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-red-700 font-bold text-6xl">{{ sprintf("%02d", count($classes)) }}</span>
      <span class="text-red-700 uppercase mt-3 font-semibold text-center text-xl">Classes</span>
    </div>
    <div class="w-44 h-44 bg-purple-100 border-6 border-purple-600 rounded-full flex flex-col justify-center items-center m-5">
      <span class="text-purple-700 font-bold text-6xl">{{ sprintf("%02d", count($subjects)) }}</span>
      <span class="text-purple-700 uppercase mt-3 font-semibold text-center text-xl">Matières</span>
    </div>
  </div>
</div>


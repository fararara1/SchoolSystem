<div class="bg-white border-b border-blue-400 px-6 py-3 flex items-center justify-between shadow-sm fixed top-0 left-0 right-0 z-50 h-16">
    <div class="flex items-center text-blue-800">
        <!-- Logo avec couleur cyan plus douce -->
        <span class="text-cyan-500 text-xl mr-3" aria-label="Trophée" role="img">🏆</span>


        <span class="font-semibold text-base sm:text-lg space-x-1">
    <span class="text-red-500">G</span>
    <span class="text-orange-500">e</span>
    <span class="text-yellow-500">s</span>
    <span class="text-green-500">t</span>
    <span class="text-blue-500">i</span>
    <span class="text-indigo-500">o</span>
    <span class="text-purple-500">n</span>
    <span class="text-gray-100"> </span>
    <span class="text-pink-400">d</span>
    <span class="text-cyan-400">e</span>
    <span class="text-lime-400">s</span>
    <span class="text-emerald-400"> </span>
    <span class="text-orange-400">N</span>
    <span class="text-blue-400">o</span>
    <span class="text-purple-400">t</span>
    <span class="text-rose-400">e</span>
    <span class="text-teal-400">s</span>
</span>

    </div>

    <div class="relative">
        @auth
            <div class="flex items-center cursor-pointer" id="opennavdropdown">
                <p class="text-sm text-blue-800 font-medium">{{ auth()->user()->name }}</p>
                <svg class="w-4 h-4 ml-2 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>

            <div class="absolute right-0 mt-3 w-48 bg-white shadow border border-blue-300 rounded hidden" id="navdropdown">
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">Déconnexion</button>
                </form>
            </div>
        @else
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="flex items-center text-sm text-blue-700 font-semibold hover:underline">
                    <svg class="h-4 w-4 mr-1 text-cyan-400" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M416 448h-84c-6.6 0-12-5.4-12-12v-40..." />
                    </svg>
                    Connexion
                </a>
            @endif
        @endauth
    </div>
</div>

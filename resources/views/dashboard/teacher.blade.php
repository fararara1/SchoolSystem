<div class="w-full block mt-8">
  <div class="flex flex-wrap sm:flex-no-wrap justify-center gap-y-4">
    <div class="w-44 h-44 bg-blue-100 border-6 border-blue-600 rounded-full flex flex-col justify-center items-center mr-8">
      <svg class="fill-current text-blue-700 mb-2" style="width:50px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
      </svg>
      <span class="text-blue-700 font-bold text-6xl">{{ sprintf("%02d", $teacher->classes_count) }}</span>
      <span class="text-blue-700 uppercase mt-3 font-semibold text-center text-xl">Les Classes</span>
    </div>

    <div class="w-44 h-44 bg-orange-100 border-6 border-orange-600 rounded-full flex flex-col justify-center items-center">
      <svg class="fill-current text-orange-700 mb-2" style="width:50px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
      </svg>
      <span class="text-orange-700 font-bold text-6xl">{{ sprintf("%02d", $teacher->subjects_count) }}</span>
      <span class="text-orange-700 uppercase mt-3 font-semibold text-center text-xl">Les Matières</span>
    </div>
  </div>
</div>

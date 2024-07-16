<x-app-layout>
    
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('welcome') }}
     
      <span class="py-2 px-2 bg-pink-400 border-2 rounded-md">
        {{ Auth::user()->email }}
      </span>
    </h2>
  </x-slot>

    <div class="py-12">
      <div class="max-w-7xl sm:px-6 lg:px-8 mt-5">
         
      </div>
    </div>
</x-app-layout>

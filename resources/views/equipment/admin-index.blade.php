<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <x-headings.h2>{{ __('My Broadband Equipment') }}</x-headings.h2>
      <a href="{{ route('equipment.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        {{ __('Add New') }}
      </a>
    </div>
  </x-slot>

  {{-- @livewire('toasts') --}}

  <div class="mt-12">
    @livewire('equipment-table')
  </div>
</x-app-layout>

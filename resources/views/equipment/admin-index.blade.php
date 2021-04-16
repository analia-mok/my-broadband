<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center">
      <x-headings.h2>{{ __('My Broadband Equipment') }}</x-headings.h2>
      <x-jet-button type="button" class="ml-auto">{{ __('Add New') }}</x-jet-button>
    </div>
  </x-slot>

  {{-- @livewire('toasts') --}}

  <div class="mt-12">
    @livewire('equipment-table')
  </div>
</x-app-layout>

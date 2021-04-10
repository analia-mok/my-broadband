<x-app-layout>
  <x-slot name="header">
    <x-headings.h2>{{ __('My Broadband Equipment') }}</x-headings.h2>
  </x-slot>

  <div class="mt-12">
    @livewire('equipment-table')
  </div>
</x-app-layout>

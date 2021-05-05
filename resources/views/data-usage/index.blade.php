<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center">
      <x-headings.h2>{{ __('My Data') }}</x-headings.h2>
    </div>
  </x-slot>

  {{-- @livewire('toasts') --}}

  <div class="mt-12 p-8 container mx-auto max-w-4xl shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
    @livewire('data-usage-chart')
  </div>
</x-app-layout>

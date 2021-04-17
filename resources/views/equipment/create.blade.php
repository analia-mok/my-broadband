<x-app-layout>
  <x-slot name="header">
    <x-headings.h2>{{ __('Create Device') }}</x-headings.h2>
  </x-slot>

  <x-breadcrumbs>
    <a href="{{ route('admin.dashboard') }}">
      {{ __('Admin') }}
    </a>
    <span>
      <x-icons.chevron-right />
    </span>
    <a href="{{ route('equipment.admin') }}">
      {{ __('Equipment') }}
    </a>
  </x-breadcrumbs>

  <div class="mt-12 container mx-auto max-w-4xl shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    @livewire('forms.equipment-form', ['operation' => 'create'])
  </div>
</x-app-layout>

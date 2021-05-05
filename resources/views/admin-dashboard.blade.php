<x-app-layout>
  <x-slot name="header">
    <x-headings.h2>
        {{ __('Dashboard') }}
    </x-headings.h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white shadow-xl sm:rounded-lg p-8">
              <ul class="list-disc">
                <li><a href="{{ route('equipment.admin') }}" class="text-blue-500 underline">Manage Equipment</a></li>
              </ul>
          </div>
      </div>
  </div>
</x-app-layout>
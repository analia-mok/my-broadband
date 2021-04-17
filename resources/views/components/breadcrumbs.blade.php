<nav {{ $attributes->merge(['class' => 'mt-4 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-gray-600 text-sm font-medium']) }}>
  <div class="flex items-center space-x-2">
    {{ $slot }}
  </div>
</nav>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table {{ $attributes->merge(['class' => 'divide-y divide-gray-200']) }}>
        <thead class="bg-indigo-600">
            {{ $header }}
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            {{ $body }}
        </tbody>
    </table>
</div>

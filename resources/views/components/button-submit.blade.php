@props(['value'])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'my-3 p-3 bg-blue-700 text-white rounded-md font-semibold border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600']) }}>
    {{ $value ?? $slot }}
</button>

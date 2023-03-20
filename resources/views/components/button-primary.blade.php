@props(['value'])

<button {{ $attributes->merge(['class' => 'my-3 p-3 bg-blue-700 text-white rounded-md font-semibold text-xl']) }}>
    {{ $value ?? $slot }}
</button>

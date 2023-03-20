@props(['value'])

<label {{ $attributes->merge(['class' => 'text-white text-lg']) }}>
    {{ $value ?? $slot }}
</label>

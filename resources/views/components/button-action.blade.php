<button {{ $attributes->merge(['type' => 'submit', 'class' => 'my-2 mx-2 p-2 bg-blue-700 text-white rounded-md']) }}>
    {{ $slot }}
</button>

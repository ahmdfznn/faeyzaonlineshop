<x-auth>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex flex-col w-[35vw]">
        <h1 class="text-white text-3xl mb-6 judul">Blondy store</h1>
        <form action="{{ route('register') }}" method="post" class="flex flex-col">
            @csrf
            <x-label for="username" :value="__('username')" />
            <x-input-text type="text" id="username" name="username" required autofocus autocomplete="off" />
            @error('username')
                {{ $message }}
            @enderror
            <x-label for="email" :value="__('email')" />
            <x-input-text type="email" id="email" name="email" required autocomplete="off" />
            @error('email')
                {{ $message }}
            @enderror
            <x-label for="password" :value="__('password')" />
            <x-input-text type="password" id="password" name="password" required />
            @error('password')
                {{ $message }}
            @enderror
            <x-label for="password_confirmation" :value="__('password confirmation')" />
            <x-input-text type="password" id="password_confirmation" name="password_confirmation" required />
            @error('password_confirmation')
                {{ $message }}
            @enderror
            <x-button-submit>{{ __('Register') }}</x-button-submit>
            <h1 class="text-white">already have an account? just log in. <a href="{{ route('login') }}"
                    class="text-blue-600 underline">just log in</a></h1>
        </form>
    </div>
</x-auth>

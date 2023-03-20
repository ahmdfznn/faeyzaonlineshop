<x-auth>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex flex-col w-[35vw]">
        <div class="w-full flex flex-col justify-center items-center">
            <img src="/img/logo.png" alt="img" class="w-32">
            <h1 class="text-white text-2xl mb-6 judul">Faeyza</h1>
        </div>
        <form action="{{ route('login') }}" method="post" class="flex flex-col">
            @csrf
            <x-label for="username" :value="__('username')" />
            <x-input-text type="text" id="username" name="username" required autofocus autocomplete="off" />
            @error('username')
                {{ $message }}
            @enderror
            <x-label for="password" :value="__('password')" />
            <x-input-text type="password" id="password" name="password" required />
            @error('password')
                {{ $message }}
            @enderror
            <a href="{{ route('password.request') }}" class="text-blue-600 w-full block text-right">forgot
                password??</a>
            <div class="flex">
                <input type="checkbox" name="remember" id="remember_me">
                <label for="remember_me" class="text-white ml-2">Remember Me</label>
            </div>
            <x-button-submit>{{ __('Login') }}</x-button-submit>
            <h1 class="text-white">Don't have an account? <a href="{{ route('register') }}"
                    class="text-blue-600 underline">register here.</a></h1>
        </form>
    </div>
</x-auth>

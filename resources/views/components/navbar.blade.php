<nav id="{{ Request::is('/') ? 'navbar' : '' }}"
    class="w-screen h-[50px] bg-slate-900/70 backdrop-blur-lg fixed flex items-center justify-between px-10 z-50">
    <div class="flex items-center">
        <img src="/img/logo.png" alt="logo" class="w-10 mx-3">
        <h1 class="text-white font-semibold text-xl judul tracking-widest"><a href="/">Faeyza</a>
        </h1>
    </div>
    <div class="flex items-center justify-between w-[15vw] mr-3">
        @can('admin')
            <a href="/dashboard" class="text-white text-lg">Dashboard</a>
        @endcan
        @guest
            <div>
                <i class="fa-regular fa-right-to-bracket"></i>
                <a href="/login" class="text-white text-lg">Sign in</a>
            </div>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <i class="fas fa-sign-out-alt text-xl mx-2 text-white"></i>
                <button type="submit" class="text-white text-lg">Sign out</button>
            </form>
        @endauth
    </div>
</nav>
@if (Request::is('/'))
    <nav class="w-screen h-32 absolute flex justify-between items-center p-10 bg-slate-900/20" id="subnav">
        @if (auth()->check())
            <div class="flex" id="search">
                <a href="/dashboardUser/profile" class="flex text-white items-center">
                    <div
                        class="flex justify-center items-center w-16 h-16 overflow-hidden rounded-full mr-2 border border-indigo-600">
                        <img src="@if (auth()->user()->profile_picture) {{ asset('storage/' . auth()->user()->profile_picture) }}
                    @else /icon/user.png @endif"
                            alt="" class="w-full">
                    </div>
                    <h1>{{ auth()->user()->username }}</h1>
                </a>
            </div>
        @endif
        <div class="flex items-center" id="subtitle">
            <a href="@auth/profile/{{ auth()->user()->username }} @endauth"><img src="/img/logo.png" alt="logo"
                    class="w-20 mx-3"></a>
            <h1 class="text-slate-200 font-semibold text-4xl judul tracking-widest"><a href="">Faeyza</a>
            </h1>
        </div>
        <div class="flex items-center mr-3" id="toggle">
            @can('admin')
                <a href="/manageProduct" class="text-white text-lg mx-3">Dashboard</a>
            @endcan
            @guest
                <div class="flex items-center">
                    <i class='fas fa-sign-in-alt text-white text-2xl mx-3'></i>
                    <a href="/login" class="text-white text-lg">Sign in</a>
                </div>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="post" class="text-white flex items-center">
                    @csrf
                    <i class="fas fa-sign-out-alt text-xl mx-2"></i>
                    <button type="submit" class="text-white text-lg">Sign out</button>
                </form>
            @endauth
        </div>
    </nav>
@endif

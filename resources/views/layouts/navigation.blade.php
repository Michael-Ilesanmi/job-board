<nav id="topNav" class="scrollNav fixed top-0 left-0 right-0">
    <div class="container flex items-center justify-between pt-2 pb-4">
        <a href="/" class="text-2xl font-semibold">
             <img src="{{URL::asset('/image/logo.png')}}" alt="Sarve Logo" class="h-12" >
        </a>
        <ul class="flex items-center gap-x-8 text-sm justify-end font-medium">
            <li><a href="/about">About</a></li>
            <li><a href="/contact-us">Contact</a></li>
            @if (Auth::check())
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Log out</a></li>
            @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endif
        </ul>
    </div>
</nav>

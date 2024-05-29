<x-guest-layout>
    <div class="flex items-stretch w-full min-h-full  bg-[#F0F2F5]">
        <div class="lg:block hidden w-5/12 min-h-full bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1716796198677-eee1faed3b43?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')]">
        </div>
        <div class="w-full lg:w-7/12 h-full">
            <div class="mt-4 px-8 text-sm flex items-center justify-between">
                <a href="/" class="text-2xl font-semibold">
                    <img src="{{URL::asset('/image/logo.png')}}" alt="Sarve Logo" class="h-8" >
                </a>
                <p class="text-right">
                    Don't have an account? 
                    <a href="/register" class="text-green-500 font-medium">Sign Up!</a>
                </p>
            </div>
            <div class="flex flex-col justify-center items-center p-10 w-5/6 md:w-3/6 mx-auto">
                <h1 class="text-3xl font-bold text-center">Welcome Back</h1>
                <p class="font-medium text-sm text-center mt-1 text-gray-600">Login to your account</p>
                <div class="grid grid-cols-2 justify-center gap-x-2 my-4">
                    <a href="{{ route('auth.google') }}" class="flex gap-x-2 items-center bg-white shadow hover:shadow-lg transition ease-linear duration-300 border border-blue-400 rounded-md p-2 text-xs font-semibold"><span class="iconify" data-icon="devicon:google"></span> Google</a>
                    <a href="{{ route('auth.facebook') }}" class="flex gap-x-2 items-center bg-white shadow hover:shadow-lg transition ease-linear duration-300 border border-blue-400 rounded-md p-2 text-xs font-semibold"><span class="iconify" data-icon="logos:facebook"></span> Facebook</a>
                </div>
                <div class="text-sm font-medium my-4 flex items-center gap-x-2 w-full">
                    <div class="h-[1px] rounded-sm w-full bg-slate-300 grow"></div>
                    <p class="whitespace-nowrap font-semibold">
                        or continue with
                    </p>
                    <div class="h-[1px] rounded-sm w-full bg-slate-300 grow"></div>
                </div>
                <form class="space-y-6 w-full" method="POST" action="{{ route('login') }}">
                @csrf
                    <div>
                        <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                            <input required name="email" type="email" placeholder="Email" class="outline-none ring-0 border-none w-full" autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                            <input required id="password" name="password" type="password" placeholder="Password" class="outline-none ring-0 border-none w-full" autocomplete="current-password" />    
                            <i id="togglePassword" class="cursor-pointer transition ease-linear duration-500 absolute top-1/2 -translate-y-1/2 right-4 fa-regular fa-eye"></i>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between gap-x-4 text-sm">
                        <div class="flex gap-x-2 items-center">
                            <input type="checkbox" name="remember_me" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 outline-none border-none ring-0" />
                            <label for="remember_me" class="whitespace-nowrap">Remember me</label>    
                        </div>
                        <a href="" class="text-red-500 whitespace-nowrap">Recover Password</a>
                    </div>
                    <button type="submit" class="bg-transparent font-medium text-slate-900 text-center w-full py-2 px-4 hover:bg-slate-900 hover:text-white transition ease-linear duration-300 border border-slate-900 rounded-md">Log In</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    window.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword");

    togglePassword.addEventListener("click", function (e) {
        const password = document.querySelector("#password");
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("fa-eye-slash");
    });
    });
</script>
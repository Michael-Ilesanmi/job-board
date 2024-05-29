<x-guest-layout>
    <div class="flex flex-row-reverse w-full h-full bg-[#F0F2F5]">
        <div class="lg:block hidden w-5/12 min-h-full bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1716497916271-65c49715bd03?q=80&w=1428&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')]">
        </div>
        <div class="w-full lg:w-7/12 h-full">
            <div class="mt-4 px-8 text-sm flex items-center justify-between">
                <a href="/" class="text-2xl font-semibold">
                    <img src="{{URL::asset('/image/logo.png')}}" alt="Sarve Logo" class="h-8" >
                </a>
                <p class="text-right">
                    Already have an account? 
                    <a href="/login" class="text-green-500 font-medium">Sign In!</a>
                </p>
            </div>
            <div class="flex flex-col justify-center items-center p-10 w-5/6 md:w-3/6 mx-auto">
                <h1 class="text-3xl font-bold text-center">Get Started</h1>
                <p class="font-medium text-sm text-center mt-1 text-gray-600">Getiing started is easy</p>
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
                <form class="space-y-6 w-full" method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="grid grid-cols-2 gap-x-4">
                        <div>
                            <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                                <input required name="first_name" type="text" placeholder="First Name" class="outline-none ring-0 border-none w-full" autocomplete="given-name" />
                            </div>
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div>
                            <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                                <input required name="last_name" type="text" placeholder="Last Name" class="outline-none ring-0 border-none w-full" autocomplete="family-name" />
                            </div>
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
                    <div>
                        <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                            <input required name="email" type="email" placeholder="Enter Email" class="outline-none ring-0 border-none w-full" :value="old('email')" autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                            <input required id="password" name="password" type="password" placeholder="Password" class="outline-none ring-0 border-none w-full" autocomplete="new-password" />    
                            <i id="togglePassword" class="cursor-pointer transition ease-linear duration-500 absolute top-1/2 -translate-y-1/2 right-4 fa-regular fa-eye"></i>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <div class="relative w-full rounded-md border border-gray-500 overflow-clip">
                            <input required id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password" class="outline-none ring-0 border-none w-full" autocomplete="new-password" />    
                            <i id="toggleConfirmPassword" class="cursor-pointer transition ease-linear duration-500 absolute top-1/2 -translate-y-1/2 right-4 fa-regular fa-eye"></i>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirm')" class="mt-2" />
                    </div>
                    <button type="submit" class="bg-green-500 font-medium text-slate-900 text-center w-full py-2 px-4 hover:bg-green-600 transition ease-linear duration-300 rounded-md">Create Account</button>
                </form>
                <p class="text-sm text-gray-500 font-medium whitespace-nowrap my-8">By continuing you indicate that you read and agreed to the Terms of Use</p>
            </div>
        </div>
    </div>
</x-guest-layout>


<script>
    window.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.querySelector("#togglePassword");
        const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");

        togglePassword.addEventListener("click", function (e) {
            const password = document.querySelector("#password");
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye / eye slash icon
            this.classList.toggle("fa-eye-slash");
        });
        toggleConfirmPassword.addEventListener("click", function (e) {
            const password_confirm = document.querySelector("#password_confirm");
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password_confirm.setAttribute("type", type);
            // toggle the eye / eye slash icon
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
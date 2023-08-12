<x-app-layout>
    <div class="">
        <div class="bg-[linear-gradient(to_right_bottom,rgba(49,84,44,0.8),rgba(16,71,52,0.8)),url('https://images.unsplash.com/photo-1691608153399-9c610a3dbfd0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80')] bg-cover bg-center pt-24">
            <!-- Header Section -->
            <div class="space-y-4 w-full flex items-center justify-center flex-col py-24">
                <h1 class="text-3xl text-white font-bold">
                    {{ $job->title }}
                </h1>
                <div class="space-y-1 flex flex-col justify-center text-center">
                    <p class="text-sm font-medium text-white">
                        <i class="fa-solid fa-building"></i> {{ $job->company ?? " " }}
                    </p>
                    <p class="text-xs italic text-white">
                        <i class="fa-solid fa-location-dot"></i> {{ $job->location ?? " " }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Job -->
    <div class="container py-12">
        <nav class="mb-6 font-light">
            >>> <a href="/jobs" class="text-blue-700">Jobs</a> / {{ $job->title}}
        </nav>
        {!! $job->content !!}        
    </div>
</x-app-layout>

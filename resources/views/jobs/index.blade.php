<x-app-layout>
    <div class="min-h-screen">
        <div class="bg-[linear-gradient(to_right_bottom,rgba(147,51,234,0.4),rgba(140,61,225,0.5)),url('https://images.unsplash.com/photo-1691608153399-9c610a3dbfd0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80')] bg-cover bg-center pt-24">
            <!-- Hero Section -->
            <div class="space-y-6 w-full flex items-center justify-center flex-col py-16">
                <h1 class="text-2xl text-white">
                    We offer <strong>{{ App\Models\Job::count() }}</strong> job vacancies right now!
                </h1>
                <form action="{{ route('jobs.all') }}" method="GET" class="w-full md:w-4/6 mx-auto flex space-x-4 mb-12">
                    <input value="{{ request()->get('search') }}" type="text" name="search" id="search" placeholder="Keywords (job title, location, company)" class="bg-white text-slate-600 font-medium text-sm grow outline-none border-none px-4 py-4 rounded-sm shadow-lg focus:ring-0" />
                    <button type="submit" class="py-4 px-6 rounded-sm shadow-lg hover:shadow-2xl bg-green-600 text-white font-semibold transition ease-linear">Find Jobs</button>
                </form>
            </div>
            <!--  -->
            <div class="bg-pink-400 mt-12">
                <div class="flex justify-between items-stretch py-12 space-x-12 text-center text-white container">
                    <div class="space-y-6">
                        <h2 class="font-semibold text-xl">Seeking for a job?</h2>
                        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, ipsum! Dolor repellendus possimus quod totam unde illum suscipit doloremque ad?</p>
                        <a href="/jobs" class="inline-block text-sm border border-white bg-transparent px-4 py-2 text-white rounded">Search jobs</a>
                    </div>
                    <div class="space-y-6">
                        <h2 class="font-semibold text-xl">Seeking for a candidate?</h2>
                        <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, ipsum! Dolor repellendus possimus quod totam unde illum suscipit doloremque ad?</p>
                        <a href="/login" class="inline-block text-sm border border-white bg-transparent px-4 py-2 text-white rounded">Post a job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs -->
    <div class="container py-16">
        <div class="grid md:grid-cols-2 gap-6 md:gap-12">
            @foreach($jobs as $key => $job)
            <a href="/{{$job->slug}}" class="border-b border-gray-300 py-4 px-6 hover:shadow-lg transition ease-linear cursor-pointer">
                <h2 class="font-semibold text-xl text-slate-700">{{ $job->title ?? " "}}</h2>
                <div class="flex items-start justify-between">
                    <p class="text-gray-700 text-sm">
                        {{ $job->company ?? " " }}
                    </p>
                    <p class="text-gray-500 text-xs italic">
                        {{ $job->location ?? " " }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="my-12 mx-auto w-fit">
            <a href="/jobs" class="py-3 px-6 rounded-sm shadow-lg hover:shadow-2xl bg-purple-600 text-white font-semibold transition ease-linear w-fit mx-auto text-center">Browse Jobs</a>
        </div>
    </div>
</x-app-layout>

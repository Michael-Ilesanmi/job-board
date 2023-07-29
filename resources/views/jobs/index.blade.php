<x-guest-layout>
    @foreach($jobs as $key => $job)
    <div>
        {{$job->title}}
    </div>
    @endforeach
    {{$jobs}}
</x-guest-layout>

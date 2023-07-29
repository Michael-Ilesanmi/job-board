<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    function index() {
        $jobs = Job::paginate(10);

        return view('jobs.index', ['jobs'=>$jobs]);
    }

    function job($slug) : View {
        $job = Job::where('slug', $slug)->first();
        
        return view('jobs.show', compact('job'));
    }

    function store(Request $request) : RedirectResponse {
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string'
        ]);
        try {
            $job = [];
    
            $job['title'] = $request->title;
            $job['content'] = $request->content;
            $job['slug'] = Str::slug($job['title']);
            $job['posted_by'] = auth()->user()->id;
    
            Job::create($job);
    
            return redirect()->back()->with('message','success');
        } catch (\Throwable $err) {
            return redirect()->back()->with('message', $err->getMessage());
        }
    }
}

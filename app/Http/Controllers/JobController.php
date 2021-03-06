<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('welcome', compact('jobs'));
    }

    public function show($id, $job)
    {
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function myJobs()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjobs', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());

        return redirect()->back()->with('message', 'Job Updated Successfully!');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company->id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date')
        ]);

        return redirect()->back()->with('message', 'Job Posted Successfully!');
    }
}

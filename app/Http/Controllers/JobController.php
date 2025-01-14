<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);

        return view(
            view: 'jobs.index',
            data: compact('jobs')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            view: 'jobs.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9\s\-]+$/u',
                'unique:job_listings,title',
                'max:255',
                'min:3',
            ],
            'salary' => [
                'required',
                'regex:/^\$\d{1,3}(,\d{3})*(\.\d{2})?$/',
                'max:14',
            ],
        ]);

        /** @var User $user */
        $user = Auth::user();

        if ($user->employers->isEmpty()) {
            Employer::factory()->create([
                'user_id' => $user->id,
            ]);

            $user->load('employers');
        }

        $employer = $user->employers->random();

        $job = Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => $employer->id,
        ]);

        Mail::to($user)->queue(new JobPosted($job));

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view(
            view: 'jobs.show',
            data: compact('job')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        return view(
            view: 'jobs.edit',
            data: compact('job')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9\s-]+$/u',
                'min:3',
                'max:255',
            ],
            'salary' => [
                'required',
                'regex:/^\$\d{1,3}(,\d{3})*(\.\d{2})?$/',
                'max:14',
            ],
        ]);

        $job->update($validated);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $message = $job->title . ' job deleted successfully';
        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->with('success', $message);
    }
}

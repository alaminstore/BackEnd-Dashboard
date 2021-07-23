<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Job;
use App\JobApplicant;
use App\Requirement;
use App\Responsibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CareerPageController extends Controller
{

    // start jobs section
    public function jobs() {
        $jobs = Job::get();
        foreach ($jobs as $job) {
            $description               = substr($job->description, 0, 25);
            $job->formated_description = $description;

            foreach ($job->requirements as $requirement) {
                $format_requirement                = substr($requirement->requirement, 0, 25);
                $requirement->formated_requirement = $format_requirement;
            }
            foreach ($job->responsibilities as $responsibility) {
                $format_responsibility                   = substr($responsibility->responsibility, 0, 25);
                $responsibility->formated_responsibility = $format_responsibility;
            }
        }

        return view('admin.careerpage.jobs', compact('jobs'));
        // return view('backend.careers.job', compact('jobs'));
    }
    public function jobAdd(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title'          => 'required|max:100',
            'location'       => 'required|max:100',
            'description'    => 'required|max:2000',
            'requirement'    => 'required|max:2000',
            'responsibility' => 'required|max:2000',
            'last_date'      => 'required|date',
        ]);
        if ($validator->fails()) {
            $data          = array();
            $data['error'] = $validator->errors()->all();
            return response()->json([
                'success' => false,
                'data'    => $data,
            ]);
        } else {
            // create job
            $job = Job::create([
                'title'       => $request->title,
                'location'    => $request->location,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'deadline'    => $request->last_date,
            ]);
            // create job requirement
            $requirement = Requirement::create([
                'requirement' => $request->requirement,
            ]);
            // create job responsibility
            $responsibility = Responsibility::create([
                'responsibility' => $request->responsibility,
            ]);
            $job->requirements()->attach($requirement); // store into pivot table
            $job->responsibilities()->attach($responsibility); // store into pivot table

            $description        = substr($job->description, 0, 25);
            $short_description  = substr($job->description, 0, 25);
            $job_requirement    = substr($requirement->requirement, 0, 25);
            $job_responsibility = substr($responsibility->responsibility, 0, 25);

            $data                   = array();
            $data['message']        = 'data created successfully';
            $data['title']          = $job->title;
            $data['description']    = strip_tags($description);
            $data['short_description'] = strip_tags($short_description);
            $data['requirement']    = strip_tags($job_requirement);
            $data['responsibility'] = strip_tags($job_responsibility);
            $data['location']       = $job->location;
            $data['applicants']     = $job->applicants->count();
            $data['id']             = $job->id;

            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        }
    }
    public function jobView(Request $request) {
        $data = Job::findOrFail($request->id);
        // dd();
        $requirement            = $data->requirements->first();
        $responsibility         = $data->responsibilities->first();
        $data['requirement']    = $requirement->requirement;
        $data['responsibility'] = $responsibility->responsibility;
        $data['posted_date']    = $data->created_at->toFormattedDateString();
        $data['dedline']        = $data->deadline->toFormattedDateString();
        if ($data) {
            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data'    => 'No information found',
            ]);
        }
    }
    public function jobEdit(Request $request) {
        $data                   = Job::findOrFail($request->id);
        $requirement            = $data->requirements->first();
        $responsibility         = $data->responsibilities->first();
        $data['requirement']    = $requirement->requirement;
        $data['date']           = $data->deadline->toDateString();
        $data['responsibility'] = $responsibility->responsibility;

        if ($data) {
            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data'    => 'No information found',
            ]);
        }
    }
    public function jobUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'          => 'required|max:100',
            'location'       => 'required|max:100',
            'description'    => 'required|max:2000',
            'requirement'    => 'required|max:2000',
            'responsibility' => 'required|max:2000',
            'last_date'      => 'required|date',
        ]);
        if ($validator->fails()) {
            $data          = array();
            $data['error'] = $validator->errors()->all();
            return response()->json([
                'success' => false,
                'data'    => $data,
            ]);
        } else {
            $job = Job::findOrFail($request->hidden_id);
            $job->update([
                'title'       => $request->title,
                'location'    => $request->location,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'deadline'    => $request->last_date,
            ]);
            $job->requirements()->update([
                'requirement' => $request->requirement,
            ]);
            $job->responsibilities()->update([
                'responsibility' => $request->responsibility,
            ]);
            $description        = substr($job->description, 0, 25);
            $job_requirement    = substr($request->requirement, 0, 25);
            $job_responsibility = substr($request->responsibility, 0, 25);

            $data                   = array();
            $data['message']        = 'data updated successfully';
            $data['title']          = $job->title;
            $data['description']    = strip_tags($description);
            $data['requirement']    = strip_tags($job_requirement);
            $data['responsibility'] = strip_tags($job_responsibility);
            $data['location']       = $job->location;
            $data['applicant']      = $job->applicants->count();
            $data['dedline']        = $job->deadline->toFormattedDateString();
            $data['id']             = $job->id;

            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        }
    }
    public function jobDelete(Request $request) {
        $job           = Job::findOrFail($request->id);
        $job_applicant = JobApplicant::where('job_id', $request->id)->first();
        if ($job_applicant) {
            $applicant = Applicant::where('id', $job_applicant->applicant_id)->delete();
        }
        $job->delete();
        $data            = array();
        $data['message'] = 'Data deleted successfully';
        $data['id']      = $request->id;
        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);

    }
    // end job section

    // jon applicant section start
    public function jobApplication() {
        $all_applications = Applicant::get();
        foreach ($all_applications as $all_applicants) {
            foreach ($all_applicants->jobApplications as $data) {
                $all_applicants->title  = $data->title;
                $all_applicants->job_id = $data->id;
            }
        }
        return view('admin.careerpage.all_application', compact('all_applications'));
    }

    public function jobApplicants($id) {
        $job                       = Job::find($id);
        $formated_description      = substr($job->description, 0, 50);
        $job->formated_description = $formated_description;

        $applicants = $job->applicants;
        return view('admin.careerpage.job_applicant', compact('applicants', 'job'));
    }
    public function jobApplicantDelete(Request $request) {

        $applicant = Applicant::findOrFail($request->id);

        $job = JobApplicant::where('applicant_id', $request->id)
            ->Where('job_id', $request->job_id)->first();
        $job->delete();
        $applicant->delete();
        File::delete(public_path('backend/' . $applicant->cv));
        $data            = array();
        $data['message'] = 'Data deleted successfully';
        $data['id']      = $request->id;
        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\JobPostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JobsController extends Controller
{
	public function index() {
		$allJobs = JobPostsModel::with('company')->with('jobSources')->orderBy('created_at', 'desc')->simplePaginate(27);
        return View::make('jobs.index-list', compact('allJobs'));
	}
}

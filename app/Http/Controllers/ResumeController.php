<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\DataObjects\Resume;

class ResumeController extends Controller
{
    public function index(Factory $view): View
    {
        
        $resume = Cache::remember('resume_data', now()->addDay(), function () {
            $resume = Storage::disk('resumes')->get('resume.json');
            $resume_data = json_decode($resume, true);

            return Resume::fromArray($resume_data);
        });

        return $view->make('resume', [
            'resume' => $resume,
            'allowDownload' => "true"
        ]);
    }
}

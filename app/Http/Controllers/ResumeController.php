<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\ResumeService;


class ResumeController
{
    public function __construct(private readonly ResumeService $resumeService)
    {

    }

    public function index(Factory $view): View
    {
        return $view->make('resume', [
            'resume' => $this->resumeService->getResume(),
            'allowDownload' => true
        ]);
    }

    public function download()
    {
        $resume = $this->resumeService->getResume();
        $pdfDocument = Pdf::loadView('resume', ['resume' => $resume, 'allowDownload' => false]);

        return $pdfDocument->download($resume->basics->name . '-resume.pdf');
    }
}

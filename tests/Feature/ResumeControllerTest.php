<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ResumeControllerTest extends TestCase
{
    public function test_resume_page_loads_successfully()
    {
        // Arrange
        $rersumeData = [
            'basics' => [
                'name' => 'John Doe',
                'label' => 'Software Engineer',
                'email' => 'john.doe@example.com',
                'summary' => 'Experienced software engineer with a passion for developing innovative programs that expedite the efficiency and effectiveness of organizational success.',
                'location' => [
                    'city' => 'San Francisco',
                    'region' => 'US'
                ],
                'profiles' => [
                    [
                        'network' => 'LinkedIn',
                        'username' => 'john-doe',
                        'url' => 'https://www.linkedin.com/in/john-doe'
                    ]
                ],
            ],
            'work' => [],
            'skills' => [],
            'projects' => [],   
            'education' => []
        ];

        Storage::files('resumes');
        Storage::disk('resumes')->put('resume.json', json_encode($rersumeData));

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('Software Engineer');
        $response->assertSee('john.doe@example.com');
    }
}

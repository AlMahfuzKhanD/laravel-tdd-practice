<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Factories\StudentFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_student_list(): void
    {
        // Arrange 
        StudentFactory::new()->count(5)->create();
        //Act 
        // $response= $this->get(route('student.list'));
        $response= $this->json('get',route('student.list'));
        //Assert
        $response->assertStatus(200)->assertJsonCount(5);
    }
}

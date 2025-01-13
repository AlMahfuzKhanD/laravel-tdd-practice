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

    public function test_student_create(){
        $response = $this->json('get',route('student.create'));
        $response->assertStatus(200)->assertSeeText("");
    }

    public function test_student_store(){
        //Arrange
        $data = [
            'roll' => 6,
            'name' => 'Al Mahfuz',
            'email' => 'almahfuz@gmail.com',
            'phone' => '015656565',
        ];
        //Act
        $this->withoutExceptionHandling();
        $response = $this->post(route('student.store'),$data);
        //Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('students',$data);
    }

    public function test_student_delete(){
        // Arrange
        $data = StudentFactory::new()->create();
        // Act
        $response = $this->delete(route('student.destroy',['id'=> $data->id]));
        //Assert
        $response->assertStatus(200);
        $this->assertDatabaseMissing('students',['id'=> $data->id]);
    }
}

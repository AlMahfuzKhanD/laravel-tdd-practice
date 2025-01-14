<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_mail(): void
    {
        //Arrange
        Mail::fake();
        $data = [
            'title' => 'example title',
            'body' => 'lorem ipsum ',
        ];
        // Act
        Mail::to('almahfuz380@gmail.com')->send(new TestMail($data));
        // Assert
        Mail::assertSent(TestMail::class, function($mail) use($data){
            return $mail->hasTo('almahfuz380@gmail.com') &&
             $mail->data['title'] === $data['title'] &&
             $mail->data['body'] === $data['body'];
        });
    }
}

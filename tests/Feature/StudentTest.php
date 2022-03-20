<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
       $user = [
           'email' => 'dsad@mail.ru',
           'password' => '123456'
           ];
        $response = $this->call('POST', '/moderator/student/store',$user);
        $response->assertStatus(200);
    }
}

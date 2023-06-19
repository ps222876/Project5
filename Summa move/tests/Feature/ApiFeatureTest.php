<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ApiFeatureTest extends TestCase
{
   // use DatabaseTransactions, WithFaker;

    static $accessToken;

    public function test_login()
    {
        $userData = [
            'email' => 'test@test.com',
            'password' => 'geheim'
        ];

        $response = $this->post('/api/login', $userData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type'
            ]);

        self::$accessToken = $response['access_token'];
    }

    

    public function test_get_exercises()
    {
        $response = $this->get('/api/exercises');
        $response->assertStatus(200);
    }


    public function test_get_exercises1()
    {
        $response = $this->get('/api/exercises/1');
        $response->assertStatus(200);
    }

}

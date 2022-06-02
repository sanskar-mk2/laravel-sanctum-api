<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SanctumTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */
    /** @test */
    public function user_can_register()
    {
        $response = $this->postJson('/api/register', ["name" => "Sanskar", "email" => "test3@email.com", "password" => "Hello", "password_confirmation" => "Hello"]);
        $response->assertStatus(201);
    }

    /** @test */
    public function receive_token_on_register()
    {
        $response = $this->postJson('/api/register', ["name" => "Sanskar", "email" => "test4@email.com", "password" => "Hello", "password_confirmation" => "Hello"]);
        $response->assertStatus(201);
        $response->assertJson(
            fn (AssertableJson $json) =>
            $json->has("token")->etc()
        );
    }
}

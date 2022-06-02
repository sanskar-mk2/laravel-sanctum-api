<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;
    public function test_user_can_access_products_index_with_token()
    {
        // $response = $this->postJson("/api/register", ["name" => "MyName", "email" => "test4@email.com", "password" => "Hello", "password_confirmation" => "Hello"]);
        // $response->assertStatus(201);

        // $user = User::factory()->create(['password' => Hash::make('password')]);
        // $token = $user->tokens()->first();
        Sanctum::actingAs(User::factory()->create());
        // $response = $this->withHeader("Authorization", "Bearer $token")
            // ->getJson('/api/products');
        $response = $this->get("api/products");
        $response->assertStatus(200);
    }
}

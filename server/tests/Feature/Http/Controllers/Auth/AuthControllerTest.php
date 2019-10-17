<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    public function test_can_create_user()
    {
        $password = $this->faker->password;

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->postJson(route('auth.signup'), $data);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                'message' => 'User created.'
            ]);
    }

    public function test_can_activate_user()
    {
        $user = factory(User::class)->create();

        $response = $this->getJson(route('auth.signup.activate', ['token' => $user->activation_token]));

        $response->assertOk();

        $expectedUser = User::find($user->id);

        $this->assertEquals(true, $expectedUser->active);
    }

    public function test_can_login_user()
    {
        $user = factory(User::class)->create([
            'active' => true,
            'password' => bcrypt('password')
        ]);

        $response = $this->postJson(route('auth.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'token',
                    'token_type',
                    'expires_at'
                ]
            ]);
    }

    public function test_can_get_user_info()
    {
        $user = factory(User::class)->create([
            'active' => true
        ]);

        $response = $this->actingAs($user, 'api')
            ->getJson(route('auth.user'));

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'roles',
                    'avatar',
                    'name'
                ]
            ]);
    }
}

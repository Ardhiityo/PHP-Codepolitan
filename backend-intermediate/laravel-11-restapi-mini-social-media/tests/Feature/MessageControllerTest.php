<?php

namespace Tests\Feature;

use App\Models\Message;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageControllerTest extends TestCase
{
    public function testCreateMessageSucess()
    {
        $this->seed([UserSeeder::class]);

        $user1 = User::first();
        $user2 = User::where('email', 'testing@testing')->first();

        $token = Auth::login($user1);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->post('/api/messages', [
                'receiver_id' => $user2->id,
                'content' => 'Hello bro'
            ])->assertStatus(200);
    }

    public function testDeleteMessageSuccess()
    {
        $this->testCreateMessageSucess();

        $message = Message::first();

        $user1 = User::first();
        $user2 = User::where('email', 'testing@testing')->first();

        $token = Auth::login($user1);

        $this
            ->withHeader('Authorization', 'Bearer' . $token)
            ->delete('/api/messages/' . $message->id)->assertStatus(200);
    }
}

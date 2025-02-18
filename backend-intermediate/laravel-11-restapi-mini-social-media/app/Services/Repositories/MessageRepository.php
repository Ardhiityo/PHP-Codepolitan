<?php

namespace App\Services\Repositories;

use App\Models\Message;
use App\Services\Interfaces\MessageService;
use Exception;

class MessageRepository implements MessageService
{
    public function createMessage($message)
    {
        return response()->json(['data' => Message::create($message)]);
    }

    public function deleteMessage($messageId)
    {
        try {
            return response()->json(['data' => Message::findOrFail($messageId)->delete()]);
        } catch (Exception $exception) {
            return response()->json(['error' => 'message id not found'], 404);
        }
    }
}

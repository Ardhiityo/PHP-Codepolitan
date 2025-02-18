<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Services\Interfaces\MessageService;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageRepository) {}

    public function store(CreateMessageRequest $request)
    {
        return $this->messageRepository->createMessage($request->validated());
    }

    public function destroy($messageId)
    {
        return $this->messageRepository->deleteMessage($messageId);
    }
}

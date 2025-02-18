<?php

namespace App\Services\Interfaces;

interface MessageService
{
    public function createMessage($message);
    public function deleteMessage($messageId);
}

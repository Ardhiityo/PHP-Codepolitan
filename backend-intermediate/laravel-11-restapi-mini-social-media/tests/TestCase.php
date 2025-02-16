<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        DB::delete("DELETE FROM messages");
        DB::delete("DELETE FROM comments");
        DB::delete("DELETE FROM likes");
        DB::delete("DELETE FROM posts");
        DB::delete("DELETE FROM users");
    }
}

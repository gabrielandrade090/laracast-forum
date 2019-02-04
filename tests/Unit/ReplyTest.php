<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    /** @test */
    public function it_has_owner()
    {
        $reply = create('App\Reply');
        $this->assertInstanceOf(User::class, $reply->owner);
    }
}

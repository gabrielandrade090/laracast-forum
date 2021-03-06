<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException(AuthenticationException::class);

        $this->post("/threads/1/replies", []);
    }


    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be(factory(User::class)->create());

        $thread = create(Thread::class);
        $reply  = make(Reply::class);

        $this->post("/threads/$thread->id/replies", $reply->toArray());
        $this->get("/threads/" . $thread->id)
            ->assertSee($reply->body);
    }
}

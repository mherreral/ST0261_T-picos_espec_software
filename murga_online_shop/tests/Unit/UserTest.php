<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_has_many_comments()
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->comments);
    }
}

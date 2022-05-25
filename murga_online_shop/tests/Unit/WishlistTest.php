<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use App\Models\Wishlist;


class WishlistTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_wishlist_has_many_items()
    {
        $wishlist = new Wishlist;

        $this->assertInstanceOf(Collection::class, $wishlist->items);
    }
}

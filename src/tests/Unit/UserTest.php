<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase {
    use RefreshDatabase;
    /**
     * A basic unit test example.
     * @test
     *
     * @return void
     */
    public function has_projects() {
        $user = factory('App\User')->create();
        // dd($user);

        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
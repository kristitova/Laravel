<?php
declare(strict_types=1);
namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    public function testCreateSaveUsersSuccessData(): void
    {
        $data = [
            'username' => \fake()->userName(),
            'review' => \fake()->text(100),
        ];
        $response = $this->post(route('admin.users.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }

    public function testCreateUsersSuccessStatus(): void
    {
        $response = $this->get(route('admin.users.create'));

        $response->assertStatus(200);
    }


}

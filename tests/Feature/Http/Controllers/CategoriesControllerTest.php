<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    public function testIndexCategoriesSuccessStatus(): void
    {
        $response = $this->get(route('categories'));

        $response->assertStatus(200);
    }
}

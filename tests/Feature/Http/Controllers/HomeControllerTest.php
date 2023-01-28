<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndexHomeSuccessStatus(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    public function testSeeTitleHomeSuccess(): void
    {
        $text='Добро пожаловать на новостной портал';
    
        
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSeeText($text);
    }
}

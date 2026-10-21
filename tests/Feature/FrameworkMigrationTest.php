<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrameworkMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_framework_and_routes_boot_on_supported_runtime(): void
    {
        $this->assertSame(12, (int) explode('.', app()->version())[0]);
        $this->assertNotEmpty(app('router')->getRoutes()->getRoutes());
    }

    public function test_login_form_and_validation_still_work(): void
    {
        $this->get('/login')->assertOk();
        $this->post('/login', [])->assertSessionHasErrors();
    }
}

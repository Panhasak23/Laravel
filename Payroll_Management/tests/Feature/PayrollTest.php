<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PayrollTest extends TestCase
{
    use RefreshDatabase;

    public function test_employees_and_payrolls_tables_exist()
    {
        Artisan::call('migrate:fresh');
        $this->assertTrue(Schema::hasTable('employees'));
        $this->assertTrue(Schema::hasTable('payrolls'));
    }

    public function test_store_payroll_validation_fails_with_invalid_data()
    {
        Artisan::call('migrate:fresh');
        $response = $this->post(route('payrolls.store'), [
            'employee_id' => 999999,
            'period' => str_repeat('a', 8),
            'amount' => -100,
            'status' => 'invalid',
        ]);
        $response->assertSessionHasErrors(['employee_id', 'period', 'amount', 'status']);
        $response->assertRedirect(route('payrolls.create'));
    }
}


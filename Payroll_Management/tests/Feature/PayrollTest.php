<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PayrollTest extends TestCase
{
    use RefreshDatabase;

    public function test_employees_and_payrolls_tables_exist()
    {
        $this->assertTrue(Schema::hasTable('employees'));
        $this->assertTrue(Schema::hasTable('payrolls'));
    }

    public function test_store_payroll_validation_fails_with_invalid_data()
    {
        $response = $this->from(route('payrolls.create'))->post(route('payrolls.store'), [
            'employee_name' => '',
            'salary' => -100,
            'bonus' => -1,
            'deduction' => -2,
        ]);

        $response->assertSessionHasErrors(['employee_name', 'salary', 'bonus', 'deduction']);
        $response->assertRedirect(route('payrolls.create'));
    }

    public function test_can_store_payroll_and_see_it_in_index()
    {
        $payload = [
            'employee_name' => 'John Doe',
            'salary' => 1200,
            'bonus' => 200,
            'deduction' => 50,
        ];

        $storeResponse = $this->post(route('payrolls.store'), $payload);

        $storeResponse->assertRedirect(route('payrolls.index'));
        $storeResponse->assertSessionHas('success');

        $this->assertDatabaseHas('payrolls', $payload);

        $indexResponse = $this->get(route('payrolls.index'));
        $indexResponse->assertOk();
        $indexResponse->assertSee('John Doe');
    }
}


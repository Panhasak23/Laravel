<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function test_students_table_exists(): void
    {
        $this->assertTrue(Schema::hasTable('students'));
    }

    public function test_store_validation_fails_with_invalid_data(): void
    {
        $response = $this->from(route('students.create'))->post(route('students.store'), [
            'name' => '',
            'email' => 'invalid-email',
            'score' => 150,
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'score']);
        $response->assertRedirect(route('students.create'));
    }

    public function test_can_store_student_and_see_in_index(): void
    {
        $payload = [
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'score' => 92,
        ];

        $response = $this->post(route('students.store'), $payload);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', $payload);

        $index = $this->get(route('students.index'));
        $index->assertOk();
        $index->assertSee('Alice');
    }

    public function test_can_update_and_delete_student(): void
    {
        $student = Student::create([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'score' => 70,
        ]);

        $updateResponse = $this->put(route('students.update', $student), [
            'name' => 'Bobby',
            'email' => 'bobby@example.com',
            'score' => 85,
        ]);

        $updateResponse->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Bobby',
            'email' => 'bobby@example.com',
            'score' => 85,
        ]);

        $deleteResponse = $this->delete(route('students.destroy', $student));
        $deleteResponse->assertRedirect(route('students.index'));
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}

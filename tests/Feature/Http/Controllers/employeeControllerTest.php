<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\employeeController
 */
final class employeeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_behaves_as_expected(): void
    {
        $employees = employee::factory()->count(3)->create();

        $response = $this->get(route('employees.test'));
    }
}

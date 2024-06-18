<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\FancyEvent;
use App\Jobs\ComputeSalary;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
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


    #[Test]
    public function find_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        Queue::fake();

        $response = $this->get(route('employees.find'));

        Queue::assertPushed(ComputeSalary::class, function ($job) use ($employee) {
            return $job->employee->is($employee);
        });
    }


    #[Test]
    public function event_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        Event::fake();

        $response = $this->get(route('employees.event'));

        Event::assertDispatched(FancyEvent::class, function ($event) use ($employee) {
            return $event->employee->is($employee);
        });
    }
}

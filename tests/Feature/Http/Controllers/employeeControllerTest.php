<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\FancyEvent;
use App\Jobs\ComputeSalary;
use App\Models\Employee;
use App\Models\Project;
use App\Notification\checkDetails;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
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
        $employee = Project::factory()->create();

        Event::fake();
        Notification::fake();

        $response = $this->get(route('employees.event'));

        $response->assertSessionHas('employee.name', $employee->name);

        Event::assertDispatched(FancyEvent::class, function ($event) use ($employee) {
            return $event->employee->is($employee);
        });
        Notification::assertSentTo($employee, checkDetails::class, function ($notification) use ($project) {
            return $notification->project->is($project);
        });
    }


    #[Test]
    public function redirect_redirects(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.redirect'));

        $response->assertRedirect(route('employee.show', [$employee.id]));
    }


    #[Test]
    public function showEmployee_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.showEmployee'));
    }
}

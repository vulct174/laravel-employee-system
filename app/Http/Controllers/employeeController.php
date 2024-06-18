<?php

namespace App\Http\Controllers;

use App\Events\FancyEvent;
use App\Jobs\ComputeSalary;
use App\Models\Employee;
use App\Models\Project;
use App\Notification\checkDetails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class employeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employees = Employee::where('salary', $salary)->where('name', $name)->orderBy('bonus')->limit(3)->get();
    }

    public function find(Request $request): Response
    {
        $employee = Employee::find($id);

        ComputeSalary::dispatch($employee);
    }

    public function event(Request $request): Response
    {
        $id = $request->input('id');
        $project = Project::find($id);
        $employee = Employee::find(5);
        FancyEvent::dispatch($employee);
        $request->session()->flash('employee.name', $employee->name);
        $employee->notify(new checkDetails($project));
    }
}

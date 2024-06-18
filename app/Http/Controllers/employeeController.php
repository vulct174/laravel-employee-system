<?php

namespace App\Http\Controllers;

use App\Events\FancyEvent;
use App\Jobs\ComputeSalary;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
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
        $project = Project::find($id);

        FancyEvent::dispatch($employee);

        $request->session()->flash('employee.name', $employee->name);

        $employee->notify(new checkDetails($project));
    }

    public function redirect(Request $request): RedirectResponse
    {
        $id = $request->id;
        $employee = Employee::find($id);

        return redirect()->route('employee.show', ['id' => $employee->id]);
    }

    public function showEmployee(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->id;
        $employee = Employee::find($id);
        return response()->json($employee);
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\FancyEvent;
use App\Jobs\ComputeSalary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class employeeController extends Controller
{
    public function test(Request $request): \Illuminate\Http\JsonResponse
    {
        $salary = $request->input('salary', 0);
        $name = $request->input('name');
        $employees = Employee::where('salary', '>', $salary)->where('name', 'like', '%' . $name . '%')->orderBy('bonus')->limit(3)->get();
        return response()->json($employees);
    }

    public function find(Request $request): Response
    {
        $employee = Employee::find($id);

        ComputeSalary::dispatch($employee);
    }

    public function event(Request $request): Response
    {
        $employee = Employee::find($id);

        FancyEvent::dispatch($employee);
    }
}

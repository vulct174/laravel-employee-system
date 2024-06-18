<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function test(Request $request): \Illuminate\Http\JsonResponse
    {
        $salary = $request->input('salary', 0);
        $name = $request->input('name');
        $employees = Employee::where('salary', '>', $salary)->where('name', 'like', '%' . $name . '%')->orderBy('bonus')->limit(3)->get();
        return response()->json($employees);
    }
}

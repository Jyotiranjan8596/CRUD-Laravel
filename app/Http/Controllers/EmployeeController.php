<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function create_employee(Request $request)
    {
        $payload = $request->all();
        $validator = Validator::make($payload, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('create.employee')->with('message', $validator->error());
        } else {
            $result = Employee::create($payload);
            if ($result) {
                return redirect()->route('get.employee')->with('message', 'Employee has been added successfully');
            }
        }
    }

    public function get_employees()
    {
        $employees = Employee::all();
        if ($employees) {
            return view('viewEmployee', ['employees' => $employees]);
        } else {
            return redirect()->route('get.employee')->with('message', 'No data found');
        }
    }

    public function get_employee_by_id($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return view('update', ['employee' => $employee]);
        } else {
            return redirect()->route('get.employee')->with('update_message', 'Invalid Id');
        }
    }

    public function update_employee(Request $request)
    {
        $payload = $request->all();
        $id = $request->id;
        Arr::forget($payload, 'id');

        $result = Employee::find($id)->update($payload);
        if ($result) {
            return redirect()->route('get.employee')->with('message', 'Employee has been updated successfully');
        } else {
            return redirect()->route('get.employee')->with('message', 'Invalid Id');
        }
    }

    public function delete_employee($id)
    {
        // dd($id);
        $employees = Employee::find($id);
        if ($employees) {
            $result =  $employees->delete();
            if($result){

               return redirect()->route('get.employee');
            }
        } else {
            return redirect()->route('get.employee')->with('message', 'Invalid id');
        }
    }
}

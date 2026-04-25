<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = \App\Models\Payroll::with('employee')->paginate(10);
        return view('payrolls.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = \App\Models\Employee::all();
        return view('payrolls.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'period' => 'required|string|max:7',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        \App\Models\Payroll::create($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payroll = \App\Models\Payroll::with('employee')->findOrFail($id);
        return view('payrolls.show', compact('payroll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payroll = \App\Models\Payroll::with('employee')->findOrFail($id);
        $employees = \App\Models\Employee::all();
        return view('payrolls.edit', compact('payroll', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payroll = \App\Models\Payroll::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'period' => 'required|string|max:7',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        $payroll->update($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payroll = \App\Models\Payroll::findOrFail($id);
        $payroll->delete();

        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}

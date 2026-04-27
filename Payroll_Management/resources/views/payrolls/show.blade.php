@extends('layouts.app')

@section('title', 'Payroll Details')

@section('content')
<h1 class="text-3xl font-bold mb-6">Payroll Details</h1>

<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Employee Name</label>
        <p class="text-xl font-semibold">{{ $payroll->employee_name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
        <p class="text-xl">${{ number_format($payroll->salary, 2) }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Bonus</label>
        <p class="text-xl">${{ number_format($payroll->bonus, 2) }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Deduction</label>
        <p class="text-xl">${{ number_format($payroll->deduction, 2) }}</p>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Net Salary</label>
        <p class="text-2xl font-bold text-green-600">${{ number_format($payroll->salary + $payroll->bonus - $payroll->deduction, 2) }}</p>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Created</label>
        <p>{{ $payroll->created_at->format('M d, Y h:i A') }}</p>
    </div>

    <div class="flex space-x-4">
        <a href="{{ route('payrolls.edit', $payroll) }}" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600">Edit</a>
        <a href="{{ route('payrolls.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-md hover:bg-gray-600">Back to List</a>
    </div>
</div>
@endsection

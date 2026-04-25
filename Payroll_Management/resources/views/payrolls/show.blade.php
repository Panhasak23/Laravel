@extends('layouts.app')

@section('title', 'Payroll Details')

@section('content')
<h1 class="text-3xl font-bold mb-6">Payroll Details</h1>

<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Employee</label>
        <p class="text-xl font-semibold">{{ $payroll->employee->name ?? 'N/A' }}</p>
        <p class="text-gray-600">{{ $payroll->employee->position ?? 'N/A' }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Period</label>
        <p class="text-xl">{{ $payroll->period }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
        <p class="text-2xl font-bold text-green-600">${{ number_format($payroll->amount, 2) }}</p>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $payroll->status == 'paid' ? 'bg-green-100 text-green-800' : ($payroll->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
            {{ ucfirst($payroll->status) }}
        </span>
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

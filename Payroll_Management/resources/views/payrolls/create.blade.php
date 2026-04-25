@extends('layouts.app')

@section('title', 'Create Payroll')

@section('content')
<h1 class="text-3xl font-bold mb-6">Create New Payroll</h1>

<form action="{{ route('payrolls.store') }}" method="POST" class="max-w-md">
    @csrf
    <div class="mb-4">
        <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-2">Employee</label>
        <select name="employee_id" id="employee_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
            <option value="">Select Employee</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }} ({{ $employee->position }})</option>
            @endforeach
        </select>
        @error('employee_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="period" class="block text-sm font-medium text-gray-700 mb-2">Period (YYYY-MM)</label>
        <input type="text" name="period" id="period" value="{{ old('period') }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" placeholder="2024-10" required>
        @error('period')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
        <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" min="0" required>
        @error('amount')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
        <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        @error('status')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 font-medium">Create Payroll</button>
        <a href="{{ route('payrolls.index') }}" class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 font-medium text-center">Cancel</a>
    </div>
</form>
@endsection

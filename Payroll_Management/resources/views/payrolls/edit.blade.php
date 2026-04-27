@extends('layouts.app')

@section('title', 'Edit Payroll')

@section('content')
<h1 class="text-3xl font-bold mb-6">Edit Payroll</h1>

<form action="{{ route('payrolls.update', $payroll) }}" method="POST" class="max-w-md">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label for="employee_name" class="block text-sm font-medium text-gray-700 mb-2">Employee Name</label>
        <input type="text" name="employee_name" id="employee_name" value="{{ old('employee_name', $payroll->employee_name) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
        @error('employee_name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="salary" class="block text-sm font-medium text-gray-700 mb-2">Salary</label>
        <input type="number" name="salary" id="salary" value="{{ old('salary', $payroll->salary) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" min="0" required>
        @error('salary')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="bonus" class="block text-sm font-medium text-gray-700 mb-2">Bonus</label>
        <input type="number" name="bonus" id="bonus" value="{{ old('bonus', $payroll->bonus) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" min="0" required>
        @error('bonus')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="deduction" class="block text-sm font-medium text-gray-700 mb-2">Deduction</label>
        <input type="number" name="deduction" id="deduction" value="{{ old('deduction', $payroll->deduction) }}" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" min="0" required>
        @error('deduction')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex space-x-4">
        <button type="submit" class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 font-medium">Update Payroll</button>
        <a href="{{ route('payrolls.index') }}" class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 font-medium text-center">Cancel</a>
    </div>
</form>
@endsection

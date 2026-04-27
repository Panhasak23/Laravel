@extends('layouts.app')

@section('title', 'Payrolls List')

@section('content')
<h1 class="text-3xl font-bold mb-6">Payrolls</h1>

<a href="{{ route('payrolls.create') }}" class="mb-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add New Payroll</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bonus</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deduction</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Net Salary</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payrolls as $payroll)
            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                <td class="px-6 py-4 whitespace-nowrap">{{ $payroll->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $payroll->employee_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($payroll->salary, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($payroll->bonus, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($payroll->deduction, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap font-semibold text-green-700">${{ number_format($payroll->salary + $payroll->bonus - $payroll->deduction, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('payrolls.show', $payroll) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                    <a href="{{ route('payrolls.edit', $payroll) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                    <form action="{{ route('payrolls.destroy', $payroll) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-4 text-center text-gray-500">No payrolls found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $payrolls->links() }}
@endsection

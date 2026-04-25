@extends('layouts.app')

@section('title', 'Payrolls List')

@section('content')
<h1 class="text-3xl font-bold mb-6">Payrolls</h1>

<a href="{{ route('payrolls.create') }}" class="mb-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add New Payroll</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Period</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payrolls as $payroll)
            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                <td class="px-6 py-4 whitespace-nowrap">{{ $payroll->employee->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $payroll->period }}</td>
                <td class="px-6 py-4 whitespace-nowrap">${{ number_format($payroll->amount, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $payroll->status == 'paid' ? 'bg-green-100 text-green-800' : ($payroll->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($payroll->status) }}
                    </span>
                </td>
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
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No payrolls found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $payrolls->links() }}
@endsection

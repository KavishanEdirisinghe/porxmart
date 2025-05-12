@extends('layouts.farmer_lay')

@section('title', 'Field Overview')

@section('header', 'Field Overview')
@section('subheader', 'Monitor and manage all your agricultural fields')

@section('content-class', 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6')

@section('content')
    <!-- Field Cards -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-lg text-gray-800">North Field</h3>
            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Active</span>
        </div>
        <div class="text-sm text-gray-600 mb-4">
            <p><span class="font-medium">Crop:</span> Corn</p>
            <p><span class="font-medium">Planted:</span> March 15, 2025</p>
            <p><span class="font-medium">Size:</span> 12.5 acres</p>
        </div>
        <div class="flex justify-between items-center">
            <div class="text-sm">
                <span class="text-blue-600"><i class="fas fa-tint mr-1"></i> 75% moisture</span>
            </div>
            <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">View Details →</a>
        </div>
    </div>

    <!-- Add more field cards as needed -->
@endsection
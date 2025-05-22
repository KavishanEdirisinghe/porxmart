@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-600 mt-2">Welcome to Paddy Management System</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Users</p>
                        <p class="text-2xl font-semibold text-gray-900" data-stat="users">{{ $totalUsers ?? '1,234' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-seedling text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Paddy Varieties</p>
                        <p class="text-2xl font-semibold text-gray-900" data-stat="varieties">{{ $paddyVarieties ?? '25' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-map text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Farm Lands</p>
                        <p class="text-2xl font-semibold text-gray-900" data-stat="farms">{{ $farmLands ?? '456' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Production</p>
                        <p class="text-2xl font-semibold text-gray-900" data-stat="production">
                            {{ $totalProduction ?? '789' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Production Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200" style="height: 500px;">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Production</h3>
                <canvas id="productionChart" height="200"></canvas>
            </div>

            <!-- Demand Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200" style="height: 500px;">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Paddy Demand</h3>
                <div class="relative h-full">
                    <canvas id="demandChart" class="p-5"></canvas>
                </div>
            </div>


        </div>

        <!-- Recent Activities & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Users -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Users</h3>
                <div class="space-y-4">
                    @forelse($recentUsers ?? [] as $user)
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $user->fist_name }} {{ $user->last_name }}
                                </p>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">John Doe</p>
                                <p class="text-xs text-gray-500">john@example.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Jane Smith</p>
                                <p class="text-xs text-gray-500">jane@example.com</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Popular Paddy Varieties -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Popular Varieties</h3>
                <div class="space-y-4">
                    @forelse($popularVarieties ?? [] as $variety)
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $variety->name }}</p>
                                <p class="text-xs text-gray-500">{{ $variety->pericarp_colour ?? 'White' }}</p>
                            </div>
                            <span class="text-sm text-gray-600">{{ $variety->usage_count ?? rand(50, 200) }}</span>
                        </div>
                    @empty
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Basmati Rice</p>
                                <p class="text-xs text-gray-500">White</p>
                            </div>
                            <span class="text-sm text-gray-600">156</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Jasmine Rice</p>
                                <p class="text-xs text-gray-500">White</p>
                            </div>
                            <span class="text-sm text-gray-600">134</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Red Rice</p>
                                <p class="text-xs text-gray-500">Red</p>
                            </div>
                            <span class="text-sm text-gray-600">98</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin_users') }}"
                        class="block w-full bg-blue-50 hover:bg-blue-100 text-blue-700 px-4 py-3 rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i> Users
                    </a>
                    <a href="{{ route('admin_varieties') }}"
                        class="block w-full bg-green-50 hover:bg-green-100 text-green-700 px-4 py-3 rounded-lg transition-colors">
                        <i class="fas fa-seedling mr-2"></i> Add Paddy Variety
                    </a>
                    <a href="{{ route('admin_farmLand') }}"
                        class="block w-full bg-yellow-50 hover:bg-yellow-100 text-yellow-700 px-4 py-3 rounded-lg transition-colors">
                        <i class="fas fa-map mr-2"></i> Registered Farm Land
                    </a>
                    <a href="{{ route('admin_business') }}"
                        class="block w-full bg-purple-50 hover:bg-purple-100 text-purple-700 px-4 py-3 rounded-lg transition-colors">
                        <i class="fas fa-building mr-2"></i> Registered Business
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get data from Laravel controller
        const monthlyProductionData = {!! json_encode(
            $monthlyProduction ?? [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'data' => [65, 78, 90, 81, 95, 102, 88, 94, 76, 89, 92, 105],
            ],
        ) !!};
        const demandByVarietyData = {!! json_encode(
            $demandByVariety ?? [
                'labels' => ['Basmati', 'Jasmine', 'Red Rice', 'Other'],
                'data' => [30, 25, 20, 25],
            ],
        ) !!};

        // Production Chart
        const productionCtx = document.getElementById('productionChart').getContext('2d');
        new Chart(productionCtx, {
            type: 'line',
            data: {
                labels: monthlyProductionData.labels,
                datasets: [{
                    label: 'Expected Yield (tons)',
                    data: monthlyProductionData.data,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Production Overview (<?php echo date('Y'); ?>)'
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Yield (tons)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        // Demand Chart
        console.log('Demand labels:', demandByVarietyData.labels);
        console.log('Demand data:', demandByVarietyData.data);

        const demandCanvas = document.getElementById('demandChart');
        if (demandCanvas) {
            const demandCtx = demandCanvas.getContext('2d');
            new Chart(demandCtx, {
                type: 'doughnut',
                data: {
                    labels: demandByVarietyData.labels,
                    datasets: [{
                        label: 'Demand Quantity',
                        data: demandByVarietyData.data,
                        backgroundColor: [
                            'rgb(59, 130, 246)', 'rgb(16, 185, 129)', 'rgb(245, 158, 11)',
                            'rgb(239, 68, 68)', 'rgb(156, 163, 175)', 'rgb(139, 92, 246)',
                            'rgb(236, 72, 153)', 'rgb(34, 197, 94)'
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Paddy Demand by Variety'
                        },
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label;
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${label}: ${value} tons (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        } else {
            console.error("Canvas element for demand chart not found!");
        }


        // Auto-refresh charts every 5 minutes
    </script>
@endsection

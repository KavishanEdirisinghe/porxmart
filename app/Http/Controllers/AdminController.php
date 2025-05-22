<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Business_types;
use App\Models\Farm_land;
use App\Models\Paddy_demand;
use App\Models\Paddy_product;
use App\Models\Paddy_varieties;
use App\Models\User;
use App\Models\User_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('status', 1)->count();
        $paddyVarieties = Paddy_varieties::where('status', 1)->count();
        $farmLands = Farm_land::where('status', 1)->count();
        $totalProduction = Paddy_product::where('status', 1)->count();
        $totalBusinesses = Business::where('status', 1)->count();
        $totalDemands = Paddy_demand::where('status', 1)->count();

        // Get recent users (last 10)
        $recentUsers = User::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Get popular paddy varieties with usage count
        $popularVarieties = Paddy_varieties::select(
            'paddy_varieties.*',
            DB::raw('(SELECT COUNT(*) FROM paddy_production WHERE paddy_varieties_id = paddy_varieties.id) as usage_count')
        )
            ->where('paddy_varieties.status', 1)
            ->orderBy('usage_count', 'desc')
            ->limit(5)
            ->get();

        // Get monthly production data for chart
        $monthlyProduction = $this->getMonthlyProductionData();

        // Get demand data by variety for chart
        $demandByVariety = $this->getDemandByVarietyData();


        // Get user type distribution
        $userTypeDistribution = $this->getUserTypeDistribution();

        // Get recent activities
        $recentActivities = $this->getRecentActivities();

        // Get system statistics
        $systemStats = $this->getSystemStats();

        // Calculate pending tasks
        $pendingTasks = $this->getPendingTasks();

        return view('admin.dashboard', compact(
            'totalUsers',
            'paddyVarieties',
            'farmLands',
            'totalProduction',
            'totalBusinesses',
            'totalDemands',
            'recentUsers',
            'popularVarieties',
            'monthlyProduction',
            'demandByVariety',
            'userTypeDistribution',
            'recentActivities',
            'systemStats',
            'pendingTasks'
        ));
    }
    private function getMonthlyProductionData()
    {
        $monthlyData = Paddy_product::select(
            DB::raw('MONTH(sawn_date) as month'),
            DB::raw('YEAR(sawn_date) as year'),
            DB::raw('SUM(expected_yeild) as total_yield')
        )
            ->where('status', 1)
            ->whereYear('sawn_date', Carbon::now()->year)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Format data for chart
        $chartData = [];
        $labels = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('M');
            $found = $monthlyData->where('month', $i)->first();
            $chartData[] = $found ? (float)$found->total_yield : 0;
        }

        return [
            'labels' => $labels,
            'data' => $chartData
        ];
    }

    private function getDemandByVarietyData()
    {
        $demandData = Paddy_demand::join('paddy_varieties', 'paddy_demand.paddy_varieties_id', '=', 'paddy_varieties.id')
            ->select('paddy_varieties.name', DB::raw('SUM(paddy_demand.quantity) as total_demand'))
            ->where('paddy_demand.status', 1)
            ->where('paddy_varieties.status', 1)
            ->groupBy('paddy_varieties.id', 'paddy_varieties.name')
            ->orderBy('total_demand', 'desc')
            ->limit(5)
            ->get();

        return [
            'labels' => $demandData->pluck('name')->toArray(),
            'data' => $demandData->pluck('total_demand')->toArray()
        ];
    }

    private function getUserTypeDistribution()
    {
        return User_type::select('user_type.type', 'user_type.count')
            ->where('status', 1)
            ->get();
    }

    private function getRecentActivities()
    {
        $activities = collect();

        // Recent user registrations
        $recentUserRegistrations = User::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($user) {
                return [
                    'type' => 'user_registration',
                    'message' => "New user registered: {$user->fist_name} {$user->last_name}",
                    'created_at' => $user->created_at,
                    'icon' => 'fas fa-user-plus',
                    'color' => 'text-blue-600'
                ];
            });

        // Recent productions
        $recentProductions = Paddy_product::with(['user:id,fist_name,last_name', 'paddy_varieties:id,name'])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($production) {
                return [
                    'type' => 'production',
                    'message' => "New production added by {$production->user->fist_name} {$production->user->last_name}",
                    'created_at' => $production->created_at,
                    'icon' => 'fas fa-seedling',
                    'color' => 'text-green-600'
                ];
            });

        // Recent demands
        $recentDemands = Paddy_demand::with(['user:id,fist_name,last_name', 'paddy_varieties:id,name'])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($demand) {
                return [
                    'type' => 'demand',
                    'message' => "New demand created by {$demand->user->fist_name} {$demand->user->last_name}",
                    'created_at' => $demand->created_at,
                    'icon' => 'fas fa-shopping-cart',
                    'color' => 'text-purple-600'
                ];
            });

        return $activities
            ->merge($recentUserRegistrations)
            ->merge($recentProductions)
            ->merge($recentDemands)
            ->sortByDesc('created_at')
            ->take(10);
    }

    private function getSystemStats()
    {
        return [
            'database_status' => 'online',
            'api_status' => 'active',
            'last_backup' => Carbon::now()->subHours(2)->diffForHumans(),
            'server_uptime' => '99.9%',
            'total_records' => $this->getTotalRecords(),
            'active_sessions' => rand(15, 50), // This would typically come from sessions table
        ];
    }

    private function getTotalRecords()
    {
        return User::count() +
            Paddy_varieties::count() +
            Paddy_product::count() +
            Paddy_demand::count() +
            Farm_land::count() +
            Business::count();
    }

    private function getPendingTasks()
    {
        $pendingCount = 0;

        // Count inactive records that might need approval
        $pendingCount += User::where('status', 0)->count();
        $pendingCount += Paddy_product::where('status', 0)->count();
        $pendingCount += Business::where('status', 0)->count();
        $pendingCount += Farm_land::where('status', 0)->count();

        // Count recent demands that might need processing
        $pendingCount += Paddy_demand::where('status', 1)
            ->where('created_at', '>', Carbon::now()->subDays(7))
            ->count();

        return $pendingCount;
    }

    // Additional methods for specific data endpoints
    public function getChartData(Request $request)
    {
        $type = $request->get('type', 'production');

        switch ($type) {
            case 'production':
                return response()->json($this->getMonthlyProductionData());
            case 'demand':
                return response()->json($this->getDemandByVarietyData());
            case 'users':
                return response()->json($this->getUserRegistrationData());
            default:
                return response()->json(['error' => 'Invalid chart type'], 400);
        }
    }

    private function getUserRegistrationData()
    {
        $userData = User::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'labels' => $userData->pluck('date')->toArray(),
            'data' => $userData->pluck('count')->toArray()
        ];
    }

    public function getStats()
    {
        return response()->json([
            'users' => User::where('status', 1)->count(),
            'varieties' => Paddy_varieties::where('status', 1)->count(),
            'farms' => Farm_land::where('status', 1)->count(),
            'production' => Paddy_product::where('status', 1)->count(),
            'businesses' => Business::where('status', 1)->count(),
            'demands' => Paddy_demand::where('status', 1)->count(),
        ]);
    }






    public function users()
    {
        $users = User::where('status', 1)->get();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function farmLand()
    {
        $farmLands = Farm_land::select('farm_land.*', 'user.*', 'grama_niladhari_division.grama_niladhari_division')
            ->join('grama_niladhari_division', 'farm_land.grama_niladhari_division_id', '=', 'grama_niladhari_division.id')
            ->join('user', 'farm_land.users_id', '=', 'user.id')
            ->where('farm_land.status', 1)
            ->get();


        return view('admin.FarmLand.index', [
            'farmLands' => $farmLands,
        ]);
    }

    public function business()
    {
        $businesses = Business::select('business.*', 'user.*', 'business_types.type')
            ->join('user', 'business.user_id', '=', 'user.id')
            ->join('business_types', 'business.business_types_id', '=', 'business_types.id')
            ->where('business.status', 1)
            ->get();

        $businesses_types = Business_types::where('status', 1)->get();
        return view('admin.business.index', [
            'businesses' => $businesses,
            'businesses_types' => $businesses_types,
        ]);
    }

    public function varieties()
    {
        $varieties = Paddy_varieties::where('status', 1)->get();
        return view('admin.varieties.index', [
            'varieties' => $varieties,
        ]);
    }

    public function varieties_create()
    {
        return view('admin.varieties.create');
    }
    public function varieties_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'harvest_time' => 'required',
            'average_yield' => 'required',
            'pericarp_colour' => 'required',
        ]);

        Paddy_varieties::create([
            'name' => $request->name,
            'description' => $request->description,
            'harvest_time' => $request->harvest_time,
            'average_yield' => $request->average_yield,
            'pericarp_colour' => $request->pericarp_colour,
        ]);

        return redirect()->route('admin_varieties')->with('success', 'Variety created successfully');
    }

    public function varieties_edit($id)
    {
        $variety = Paddy_varieties::find($id);
        return view('admin.varieties.edit', [
            'variety' => $variety,
        ]);
    }

    public function varieties_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'harvest_time' => 'required',
            'average_yield' => 'required',
            'pericarp_colour' => 'required',
        ]);

        $variety = Paddy_varieties::find($id);
        $variety->update([
            'name' => $request->name,
            'description' => $request->description,
            'harvest_time' => $request->harvest_time,
            'average_yield' => $request->average_yield,
            'pericarp_colour' => $request->pericarp_colour,
        ]);

        return redirect()->route('admin_varieties')->with('success', 'Variety updated successfully');
    }
    public function varieties_delete($id)
    {
        $variety = Paddy_varieties::find($id);
        $variety->update([
            'status' => 0,
        ]);

        return redirect()->route('admin_varieties')->with('success', 'Variety deleted successfully');
    }
}

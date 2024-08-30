<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Renter;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\Support\Carbon;

class admin_StatisticsController extends Controller
{
    public function index()
    {
        // جلب عدد المستخدمين
        $totalUsers = User::count();

        // جلب عدد العملاء
        $totalClients = Client::count();

        // جلب عدد المؤجرين
        $totalRenters = Renter::count();

        // جلب عدد العقارات المتاحة
        $availableProperties = Property::where('availability', 1)->count();

        // جلب عدد العقارات غير المتاحة
        $unavailableProperties = Property::where('availability', 0)->count();

        // جلب عدد الحجوزات المكتملة
        $completedBookings = Booking::where('payment_status', 'completed')->count();

        // جلب عدد الحجوزات الملغاة
        $canceledBookings = Booking::where('payment_status', 'canceled')->count();

        // جلب إجمالي المبيعات للشهر الحالي
        $totalSalesCurrentMonth = Booking::where('payment_status', 'completed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_price');

        // جلب إجمالي المبيعات للشهر الماضي
        $totalSalesLastMonth = Booking::where('payment_status', 'completed')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->sum('total_price');

        return view('pages.dashboard-overview-1', compact(
            'totalUsers',
            'totalClients',
            'totalRenters',
            'availableProperties',
            'unavailableProperties',
            'completedBookings',
            'canceledBookings',
            'totalSalesCurrentMonth',
            'totalSalesLastMonth'
        ));
    }
}

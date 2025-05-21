<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $count = DB::table('pendaftarans')
            ->whereDate('created_at', $today)
            ->count();

        $countPasien = DB::table('pasiens')->count();
        $countPoli = DB::table('polis')->count();
        $countDokter = DB::table('dokters')->count();

        return view('dashboard.dashboard', compact(
            'count', 'countPasien', 'countPoli', 'countDokter'
        ));
    }
}
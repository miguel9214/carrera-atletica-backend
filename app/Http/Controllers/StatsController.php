<?php

// app/Http/Controllers/StatsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegistrationsExport;

class StatsController extends Controller
{
    /**
     * Devuelve estadísticas generales
     */
    public function stats()
    {
        $total = Registration::count();
        $today = Registration::whereDate('created_at', now())->count();
        return response()->json(['total' => $total, 'today' => $today], 200);
    }

    /**
     * Inscripciones diarias últimos 7 días
     */
    public function dailyRegistrations()
    {
        $data = Registration::selectRaw("DATE(created_at) as date, COUNT(*) as count")
            ->where('created_at','>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    /**
     * Exporta inscripciones a CSV
     */
    public function exportRegistrations()
    {
        return Excel::download(new RegistrationsExport(), 'inscripciones.csv');
    }
}


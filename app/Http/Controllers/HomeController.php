<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Provider;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:Admin|Secre']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::now();

        $year = [];
        $sales_month = [];
        $debts_month = [];
        $gananciasYear = [];
        $meses = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ];
        for ($i = 4; $i > -1; $i--) {
            $year[] = $date->year - $i;
        }

        foreach ($year as $value) {
            $gananciasYear[] = Pedido::where(DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->sum('total');
        }
        for ($i = 1; $i <= 12; $i++) {
            $sales_month[] = Pedido::where('status', 'COMPLETADO')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', '=', $i)
                ->count();
        }

        for ($i = 1; $i <= 12; $i++) {
            $debts_month[] = Pedido::where('sale_type', 'DEUDA')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', '=', $i)
                ->count();
        }

        return view('home', [
            'users' => User::count(),
            'providers' => Provider::count(),
            'sales' => Pedido::where('sale_type', 'CONTADO')->count(),
            'debts' => Pedido::where('sale_type', 'DEUDA')->count(),
            'debts_month' => $debts_month,
            'sales_month' => $sales_month,
            'meses' => $meses,
            'products' => Product::orderBy('stock')->limit(5)->get(),
            'gananciasYear' => $gananciasYear,
            'year' => $year
        ]);
    }
}

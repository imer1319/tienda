<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Sale;
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
        $this->middleware('auth');
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
        for ($i = 4; $i > -1; $i--) 
        {
            $year[] = $date->year - $i;
        }

        foreach ($year as $value) 
        {
            $gananciasYear[] = Sale::where(DB::raw("DATE_FORMAT(created_at, '%Y')"), $value)->sum('total');
        }
        for ($i = 1 ; $i<= 12; $i++){
            $sales_month[] = Sale::where('status','PAGADO')
            ->whereYear('created_at',$date->year)
            ->whereMonth('created_at', '=', $i)
            ->count();
        }

        for ($i = 1 ; $i<= 12; $i++){
            $debts_month[] = Sale::where('status','PENDIENTE')
            ->whereYear('created_at',$date->year)
            ->whereMonth('created_at', '=', $i)
            ->count();
        }

        return view('home',[
            'users' => User::count(),
            'providers' => Provider::count(),
            'sales' => Sale::where('status','PAGADO')->count(),
            'debts' => Sale::where('status','PENDIENTE')->count(),
            'debts_month' => $debts_month,
            'sales_month' => $sales_month,
            'meses' => $meses,
            'products' => Product::orderBy('stock')->limit(5)->get(),
            'gananciasYear' => $gananciasYear,
            'year' => $year
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperationCaisse;

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
        $operation_caisses = OperationCaisse::get();
        $total_retrait = OperationCaisse::where('type_operation','retrait')->sum('total_operation');
        $total_depot = OperationCaisse::where('type_operation','depot')->sum('total_operation');
        $total_remise_bank = OperationCaisse::where('type_operation','remise_bank')->sum('total_operation');

        $total_caisse = ($total_depot + $total_remise_bank) - $total_retrait;


        return view('home',[
            'operation_caisses' => $operation_caisses,
            'total_operation' => $total_caisse
        ]);
    }
}

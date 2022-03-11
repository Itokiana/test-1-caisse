<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationCaisseController extends Controller
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


    public function new_operation()
    {
        return view('operation_caisse.new_operation');
    }

    public function edit_operation()
    {
        return view('operation_caisse.new_operation');
    }
}

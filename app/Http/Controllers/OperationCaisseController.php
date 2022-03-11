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
        $type_operations = array(
            array('id' => 1, 'title' => 'dépôt de caisse'),
            array('id' => 2, 'title' => 'remise en banque'),
            array('id' => 3, 'title' => 'retrait'),
        );
        return view('operation_caisse.new_operation', [
            'type_operations' => $type_operations
        ]);
    }

    public function create_operation(Request $request)
    {
        $type_operation = $request->input('type_operation');
        $date_operation = $request->input('date_operation');
        $note_operation = $request->input('note_operation');
        $billets_operation = $request->input('billets_operation');
        $pieces_operation = $request->input('pieces_operation');
        $centimes_operation = $request->input('centimes_operation');
        $total_operation = $request->input('total_operation');

        $total = $billets_operation + $pieces_operation + $centimes_operation;

        OperationCaisse::create([
            'type_operation' => $type_operation,
            'date_operation' => $date_operation,
            'note_operation' => $note_operation,
            'total_operation' => $total
        ]);

        return redirect('home');
    }

    
    public function edit_operation()
    {
        return view('operation_caisse.new_operation');
    }
    
    public function update_operation(Request $request)
    {
        $type_operation = $request->input('type_operation');
        $date_operation = $request->input('date_operation');
        $note_operation = $request->input('note_operation');
        $billets_operation = $request->input('billets_operation');
        $pieces_operation = $request->input('pieces_operation');
        $centimes_operation = $request->input('centimes_operation');
        $total_operation = $request->input('total_operation');

        OperationCaisse::update([
            'type_operation' => $type_operation,
            'date_operation' => $date_operation,
            'note_operation' => $note_operation,
            'total_operation' => $total_operation
        ]);

        return redirect('home');
    }

    public function confirm_delete_operation($id = null)
    {
        return view('operation_caisse.confirm_delete_operation');
    }

    public function delete_operation($id = null)
    {
        if(!empty($id))
        {
            OperationCaisse::where('id', $id)->delete();
        }
        return redirect('home');
    }
}

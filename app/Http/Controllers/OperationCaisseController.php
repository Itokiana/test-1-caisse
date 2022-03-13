<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperationCaisse;

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
            array('id' => 'depot', 'title' => 'dépôt de caisse'),
            array('id' => 'remise_bank', 'title' => 'remise en banque'),
            array('id' => 'retrait', 'title' => 'retrait'),
        );
        return view('operation_caisse.new_operation', [
            'type_operations' => $type_operations
        ]);
    }

    public function create_operation(Request $request)
    {
        $validated = $request->validate([
            'type_operation' => 'required',
            'date_operation' => 'required',
        ]);

        $type_operation = $request->input('type_operation');
        $date_operation = $request->input('date_operation');
        $note_operation = $request->input('note_operation');
        $total_operation = $request->input('total_operation');


        OperationCaisse::create([
            'type_operation' => $type_operation,
            'date_operation' => date('Y-m-d', strtotime($date_operation)),
            'note_operation' => $note_operation,
            'total_operation' => intval($total_operation)
        ]);

        return redirect('home');
    }

    
    public function edit_operation($id)
    {
        $type_operations = array(
            array('id' => 'depot', 'title' => 'dépôt de caisse'),
            array('id' => 'remise_bank', 'title' => 'remise en banque'),
            array('id' => 'retrait', 'title' => 'retrait'),
        );

        $operation = OperationCaisse::where('id', $id)->first();

        return view('operation_caisse.edit_operation', [
            'type_operations' => $type_operations,
            'operation' => $operation,
            'id' => $id
        ]);
    }
    
    public function update_operation($id = null, Request $request)
    {
        if(!empty($id))
        {
            $validated = $request->validate([
                'type_operation' => 'required',
                'date_operation' => 'required',
            ]);
    
            $type_operation = $request->input('type_operation');
            $date_operation = $request->input('date_operation');
            $note_operation = $request->input('note_operation');
            $total_operation = $request->input('total_operation');
    
            $operation_caisse = OperationCaisse::where('id', $id)->first();
    
            $operation_caisse->update([
                'type_operation' => $type_operation,
                'date_operation' => date('Y-m-d', strtotime($date_operation)),
                'note_operation' => $note_operation,
                'total_operation' => intval($total_operation)
            ]);
        }

        return redirect('home');
    }

    public function confirm_delete_operation($id = null)
    {
        if(!empty($id)){
            return view('operation_caisse.confirm_delete_operation', [ 'id' => $id ]);
        }
        return redirect('home');
    }

    public function delete_operation($id = null)
    {
        if(!empty($id))
        {
            $operation = OperationCaisse::where('id', $id)->first();
            if(!empty($operation))
            {
                $operation->delete();
            }
        }
        return redirect('home');
    }
}

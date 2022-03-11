<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationCaisse extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_operation', 
        'date_operation', 
        'type_operation', 
        'note_operation'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'clinical_note_id', 'item_id', 'status', 'served_by'
    ];

    public function clinical_notes(){
        return $this->belongsTo(ClinicalNote::class, 'clinical_note_id');
    }
    public function items(){
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function employees(){
        return $this->belongsTo(Employee::class, 'id');
    }
}


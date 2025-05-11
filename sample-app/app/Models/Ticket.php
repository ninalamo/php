<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // Allow mass assignment on these fields.
    protected $fillable = [
        'title',       // Added "title" to allow mass assignment.
        'description',
        'severity',
        'status',
        'created_by',
        'assigned_to',
        'department_id',
        'remarks'
    ];
}
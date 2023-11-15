<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $primarykey  = 'id';

    //Table Name
    protected $table = 'tasks';

    //Table Columns

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'start_date',
        'end_date',
        'completed',
        'status'
    ];
}

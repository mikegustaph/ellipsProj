<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUpdate extends Model
{
    use HasFactory;

    protected $primarykey  = 'id';

    //Table Name
    protected $table = 'task_updates';

    //Table Columns

    protected $fillable = [
        'task_id'
    ];
}

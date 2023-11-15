<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $primarykey  = 'id';

    //Table Name
    protected $table = 'comments';

    //Table Columns

    protected $fillable = [
        'task_id',
        'user_id',
        'comment'
    ];
}

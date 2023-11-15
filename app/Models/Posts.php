<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $primarykey  = 'id';

    //Table Name
    protected $table = 'posts';

    //Table Columns

    protected $fillable = [
        'task_id',
        'user_id',
        'post'
    ];
}

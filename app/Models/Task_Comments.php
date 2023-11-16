<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Comments extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'task_comments';

    protected $fillable = [
        'user_id',
        'comments',
        'taskpost_id',
        'task_id'
    ];
}

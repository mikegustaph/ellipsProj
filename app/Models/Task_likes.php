<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_likes extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'task_likes';

    protected $fillable = [
        'user_id',
        'taskpost_id',
    ];
}

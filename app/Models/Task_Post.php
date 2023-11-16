<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Post extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'task_post';

    protected $fillable = [
        'user_id',
        'post',
        'task_id',
        'tasklike_id',
        'taskcomment_id',
    ];
    public function likes()
    {
        $this->hasMany(Task_likes::class);
    }
    public function comments()
    {
        $this->hasMany(Task_Comments::class);
    }
}

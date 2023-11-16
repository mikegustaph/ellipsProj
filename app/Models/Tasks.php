<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tasks extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'tasks';

    protected $fillable = [

        'name',
        'user_id',
        'date_start',
        'date_end',

    ];

    public function AssignStaff()
    {
        return $this->hasOne(Employee::class, 'id');
    }

    public function UserPoster()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'id');
    }

    public function clientservice(): BelongsTo
    {
        return $this->belongsTo(ClientsService::class);
    }

    public function userAssign()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function juniorAssign()
    {
        return $this->belongsTo(User::class, 'junior_id', 'id');
    }
}

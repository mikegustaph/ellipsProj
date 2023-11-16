<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory, HasRoles;

    protected $primarykey = 'id';

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function roleToPermission()
    {
        return $this->hasMany(Role_has_Permission::class, 'permission_id');
    }
}

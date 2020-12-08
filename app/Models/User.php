<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const POLICIES = [
        'menu' => ['index', 'create', 'show', 'edit', 'delete', 'export'],
    ];

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'email',
        'password',
        'permissions',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'array',
    ];

    /**
     * @param string $permission
     * @return bool
     */
    public function hasAccess(string $permission)
    {
        return $this->permissions[$permission] ?? false;
    }

    /**
     * @param $value
     */
    public function setPermissionsAttribute($value)
    {
        $permissions = [];
        foreach ($value as $key => $v) {
            $permissions[$key] = true;
        }
        $this->attributes['permissions'] = json_encode($permissions);
    }

    public function menu(){return $this->belongsToMany(Menu::class);}
}

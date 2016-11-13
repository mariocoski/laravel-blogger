<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($this, $token));
    }

    public static function findByEmail($email)
    {
        return static::where('email', $email)->first();
    }

    public function getDisplayName()
    {
        if (!empty($this->display_name)) {
            return $this->display_name;
        }
        return $this->email;
    }

    public function getRoleDisplayName()
    {
        if (!$this->roles || !$this->roles->sortByDesc('permissions_level')->first()) {
            return "User";
        }
        return $this->roles->sortByDesc('permissions_level')->first()->display_name;
    }

    public function hasRole($role)
    {
        return ($this->roles && $this->roles->pluck('name')->contains($role));
    }

    public function toggleRole($role)
    {
        if (is_object($role)) {

            $role = $role->getKey();
        }
        if (is_array($role)) {
            $role = $role['id'];
        }
        $this->roles()->toggle($role);
    }

    public function toggleRoles($roles)
    {
        foreach ($roles as $role) {
            $this->toggleRole($role);
        }
    }

    public static function isValidRoleId($roleId)
    {
        return Role::pluck('id')->contains($roleId);
    }

    public function attachAllRoles($roleId)
    {
        $allRoles = Role::pluck('id')->toArray();
        $rolesToAttach = array_filter($allRoles, function ($id) use ($roleId) {
            return $id <= $roleId;
        });
        $this->toggleRoles($rolesToAttach);

    }

    public function setDateOfBirthAttribute($value)
    {
        if (strlen($value)) {
            $this->attributes['date_of_birth'] = Carbon::createFromFormat('Y-m-d', $value);
        } else {
            $this->attributes['date_of_birth'] = null;
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

}

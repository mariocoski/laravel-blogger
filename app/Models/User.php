<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Image;
use Storage;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = true;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function favourites()
    {
        return $this->belongsToMany(Article::class, 'favourites');
    }

    public function scopeFavouritesArticles($query)
    {
        return $this->favourites();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($this, $token));
    }

    public static function findByEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }

    public function getDisplayName()
    {
        if (!empty($this->display_name)) {
            return $this->display_name;
        }
        return $this->email;
    }

    public static function articlesAssignable()
    {
        return static::all()->filter(function ($user) {
            //at least editor is required to edit the articles
            return $user->hasRole('editor');
        });
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'author_id', 'id');
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

    public function getTheHighestRoleId()
    {
        $highestRole = $this->roles->sortByDesc('permissions_level')->first();
        return ($highestRole && $highestRole->id) ? $highestRole->id : 1;
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

    public function resolveRole($roleId = null)
    {
        if ($roleId && $this->isValidRoleId($roleId)) {
            return $this->attachAllRoles($roleId);
        }
        return $this->attachDefaultRole();
    }

    public function attachDefaultRole()
    {
        $this->toggleRole(Role::user());
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

        $this->roles()->sync($rolesToAttach);

    }

    public function setDateOfBirthAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        $dateToSet = Carbon::createFromFormat('Y-m-d', $value);
        $this->attributes['date_of_birth'] = ($dateToSet !== false) ? $dateToSet : null;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public function updateOAuthData($authUser)
    {
        $this->fill([
            'display_name' => $authUser->name,
            'email' => $authUser->email,
        ])->save();

    }

    public function saveAvatar($avatar = null)
    {
        if ($avatar) {
            $this->update(['avatar' => $this->getAvatarName($avatar)]);
        }
    }

    protected function getAvatarName($avatar)
    {
        $image = Image::make($avatar)->encode('png');

        $filename = $this->id . ".png";

        Storage::disk('avatars')->put("/" . $filename, $image->getEncoded());

        return $filename;

    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, hasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('slug', $role);
    }

    public function hasPermission($permission)
    {
        return $this->roles->flatMap->permissions->contains($permission);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
    public function isAuthor()
    {
        return $this->hasRole('author');
    }
    public function isEditor()
    {
        return $this->hasRole('editor');
    }
    public function getRoleAttribute()
    {
        return $this->roles->first()->name ?? 'guest';
    }
    public function getAvatarAttribute($value)
    {
        return $value ?: 'default-avatar.png';
    }
}

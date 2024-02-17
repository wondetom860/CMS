<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public $table = 'web_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'phone',
        'person_id',
        // ''
        // 'balance',
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

    public function person()
    {
        return $this->belongsTo(Person::class,'person_id');

    }

    public function getFullName()
    {
        $person = $this->person;

        return $person ? $person->getFullName() : 'Super Admin';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        // var_dump($this->hasRole('SuperAdmin'));
        return $this->hasRole('Admin');
    }

    public function isSuperAdmin()
    {
        return $this->hasRole("SuperAdmin");
    }
    // public function hasRole($role)
    // {
    //     return $this->getRoleNames()->contains($role);
    //     // var_dump($roles->contains($role));
    //     // if ($roles) {
    //     //     foreach ($roles as $key => $role_) {
    //     //         if ($role == $role_) {
    //     //             return true;
    //     //         }
    //     //     }
    //     // }
    //     // return false;
    // }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    public function getDefaultPassword(){
        return "younT@123";
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

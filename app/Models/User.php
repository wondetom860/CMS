<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
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
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function getIdNumber()
    {
        $person = $this->person;
        if ($person) {
            return $person->id_number;
        }

        return "-";
    }

    public function getStaffRole()
    {
        $person = $this->person;
        if ($this->isClient()) {
            return $this->getRoles();
        }
        if ($person) {
            $courtStaff = $person->courtStaffs;
            if ($courtStaff && count($courtStaff) > 0) {
                $roless = [];
                foreach ($courtStaff as $cStaff) {
                    $roless[] = $cStaff->staffRole->role_name;
                }
                return implode($roless);
            } else {
                return "Login account does not exist, please create account for <a class='btn btn-link' href='/admin/person/show/{$person->id}'>{$person->getFullName()}</a>";
            }
        }
        return "Super-Admin User";
    }

    public function getFullName()
    {
        $person = $this->person;

        return $person ? $person->getFullName() : 'Super Admin';
    }

    public function getRoles()
    {
        $rr = [];
        $roles = Role::all();
        foreach ($roles as $r) {
            if ($this->hasRole($r)) {
                $rr[] = $r->name;
            }
        }
        return implode($rr);
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

    public function adminlte_desc()
    {
        return $this->getFullName();
    }

    public function isClerk()
    {
        return $this->hasRole(['Clerk','Clerks']);
    }

    public function isInspectionHead()
    {
        return $this->hasRole(['InspectionHead']);
    }

    // 

    public function adminlte_profile_url()
    {
        return "my-account/profile";
    }

    public function adminlte_image()
    {
        return asset('/images/undraw_image.png');
    }

    public function isClient()
    {
        return $this->hasRole('Client');
    }
    
    public function isRegistrar()
    {
        return $this->hasRole('Registrar');
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

    public function getDefaultPassword()
    {
        return "younT@123";
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'state', 'city', 'zip'];

    public static function validate($request)
    {
        $request->validate([
            'name' => "required|max:255",
            'state' => "required|max:255",
            'city' => "required|max:255",
            'zip' => "max:15",
        ]);
    }

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->name;
    }

    public function getActiveCases()
    {
        // returns counts of active cases - non-terminated
        return count($this->CaseModel()->where('case_status','<>',2)->get());
    }

    public function CaseModel()
    {
        return $this->hasMany(CaseModel::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;
    public $table = 'case_type';

    protected $fillable = ['case_type_name', 'description'];

    public static function validate($request)
    {
        $request->validate([
            'case_type_name' => "required|max:255|unique:case_type,case_type_name",
            'description' => "required",
        ]);
    }

    public function CaseModel()
    {
        return $this->hasMany(CaseModel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseArchive extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','case_id','file_type','file_path','description','remark'];

    public $table = 'case_archives';

    public static function validate($request)
    {
        $request->validate([
            'event_id' => "required|max:255",
            'case_id' => "required|max:255",
            'file_type' => "required|max:255",
            'file_path' => "required|max:255",
            'description' => "required|max:255",
            'remark' => "required|max:255",
        ]);
    }


    public function case(){
        return $this->belongsTo(CaseModel::class);
    }

    public function event(){
        return $this->belongsTo(event::class);
    }
    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function getLogoPath()
    {
        return $this->logo_image_path ? $this->logo_image_path : '/court2.jpg';
    }

    public function getDetail()
    {
        return $this->case->case_number;
    }
}

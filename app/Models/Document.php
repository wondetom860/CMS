<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['case_id', 'csa_id', 'document_type_id', 'date_filed','description','created_by'];

    public $table='document';
    public $file;
    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|exists:case,id",
            'csa_id' => "required|exists:case_staff_assignment,id",
            'document_type_id' => "required|exists:document_type,id",
            'file.*' => 'required|file|mimes:png,jpeg,jpg,pdf',
            'description' => "required",
            // // 'doc_storage_path' => "required",
        ]);
    }

    public function caseStaffAssignemnt(){
        return $this->belongsTo(Case_Staff_Assignment::class,'csa_id');
    }
    public function case(){
        return $this->belongsTo(CaseModel::class);
    }

    public function documentType(){
        return $this->belongsTo(DocumentType::class);
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

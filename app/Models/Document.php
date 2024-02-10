<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['case_id', 'csa_id', 'document_type_id', 'date_filed','description','doc_storage_path'];

    public $table='document';
    public static function validate($request)
    {
        $request->validate([
            'case_id' => "required|exists:case,id",
            'csa_id' => "required |exists:csa,id",
            'document_type_id' => "required|exists:document_type,id",
            'date_filed' => "required",
            'description' => "required",
            'doc_storage_path' => "required",
        ]);
    }
    public function getDetail(){
        return $this->name;
    }

    public function getActiveCases(){
        return 0;
    }

}

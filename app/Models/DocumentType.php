<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    public $table = 'document_type';

    protected $fillable = ['doc_type_name', 'description'];

    public static function validate($request)
    {
        $request->validate([
            'doc_type_name' => "required|max:255",
            'description' => "required",
        ]);
    }
}

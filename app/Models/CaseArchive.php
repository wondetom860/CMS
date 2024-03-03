<?php

namespace App\Models;

use Andegna\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseArchive extends Model
{
    use HasFactory;

    public $file_types = [
        'audio' => [
            '.MP3',
            '.M4A',
            '.FLAC',
           // '.MP4',
            '.WAV',
            '.WMA',
            '.AAC'
        ],
        'video' => [
            '.WEBM',
            '.MPG',
            '.MP2',
            '.MPEG',
            '.MPE',
            '.MPV',
            '.OGG',
            '.MP4',
            '.M4P',
            '.M4V',
            '.WMV',
            '.AVI',
            '.MOV',
            '.QT',
            '.FLV',
            '.SWF',
            '.AVCHD'
        ],
        'image' => [
            '.PNG',
            '.GIF ',
            '.TIFF ',
            '.PSD ',
            '.JPEG ',
            '.EPS ',
            '.AI ',
            '.INDD ',
            '.RAW ',
            '.JPG'
        ],
        'doc' => [
            '.PDF',
            '.DOC ',
            '.DOCX ',
            '.TXT ',
            '.PDF ',
        ],
    ];

    protected $fillable = ['event_id', 'case_id', 'file_path', 'description', 'remark'];

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

    public function getDate()
    {
        if (session()->get('locale') == 'am') {
            $ethiopian_date = new DateTime(date_create( $this->date_archived));
            // $gregorian = date_create($this->created_at);
            // return DateTimeFactory::fromDateTime($gregorian);
            // Constants::DATE_ETHIOPIAN_WONDE
            return $ethiopian_date->format("d/m/Y");
        } else {
            return date_format(date_create( $this->date_archived),"d/m/Y");
        }
    }
    public function getFileType($ext)
    {
        if ($ext) {
            foreach ($this->file_types as $type => $exts) {
                if (in_array($ext, $exts)) {
                    return $type;
                }
            }
            // return NULL;
        }
    }
    
    public function case()
    {
        return $this->belongsTo(CaseModel::class);
    }

    public function event()
    {
        return $this->belongsTo(event::class);
    }
    public function archivedBy()
    {
        return $this->belongsTo(User::class, 'archived_by');
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

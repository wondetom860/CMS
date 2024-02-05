<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = "persons";

    public function getFullName()
    {
        return $this->rank . " " . $this->f_name . " " . $this->m_name . " " . $this->l_name;
    }

    public function getAge()
    {
        return 26;
    }
}

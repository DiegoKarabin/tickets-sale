<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function code()
    {
        return "{$this->section_code}-{$this->row_code}-{$this->number}";
    }
}

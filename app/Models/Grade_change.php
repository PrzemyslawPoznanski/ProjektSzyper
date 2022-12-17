<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade_change extends Model
{
    use HasFactory;

    protected $table = 'grade_change';
    const CREATED_AT = 'history_created_at';
    const UPDATED_AT = 'history_created_at';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
    use HasFactory;

    protected $table ="checkup";

    protected $fillable = [
        'service_id',
        'id',
        'general_checkup',
        'checkup_status',
        



    ];
}

<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Festival extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='festivals';
    protected $fillable = [
        'name',
        'start_date',
        'starter',
        'finish_date',
        'finisher',
        'status',
    ];
    protected $hidden=['created_at','updated_at','deleted_at'];
}

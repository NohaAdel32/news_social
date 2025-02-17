<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedNewSite extends Model
{
    use HasFactory;
    protected $table="_related__sites";
    protected $fillable =[
        'name',
        'url'
    ] ;
}

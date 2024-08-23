<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Uuids;
    protected $fillable = [
        'file_name',
        'file_type',
        'title',
        'note',
    ];

    public string $storagePath = "/uploads/files/";
}

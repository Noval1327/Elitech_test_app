<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostModel extends Model
{
    use HasFactory, SoftDeletes;

    public function files()
    {
        return $this->belongsTo(FileModel::class, 'file_id')->withTrashed();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileModel extends Model
{
    use HasFactory, SoftDeletes;

    public function post()
    {
        return $this->belongsTo(PostModel::class, 'post_id', 'id')->withTrashed();
    }
}

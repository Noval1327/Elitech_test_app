<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nickname', 'bio', 'path_foto'];

    public function user()
    {
        return $this->belongsTo(AuthUserModel::class, 'user_id');
    }
}

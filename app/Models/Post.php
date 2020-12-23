<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'category_id', 'user_id', 'content', 'status'];

    public static function search($search)
    {
        return empty($search) ? static::query() : static::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('user_id', 'like', '%' . $search . '%')
            ->orWhere('category_id', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%');
    }
}

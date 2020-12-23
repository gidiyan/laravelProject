<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'votes', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query() : static::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%');
    }
}

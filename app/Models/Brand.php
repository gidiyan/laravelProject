<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'logo'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query() : static::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%');
    }
}

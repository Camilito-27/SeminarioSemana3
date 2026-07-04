<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**@use HasFactory<TaskFactory */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_limite',
        'estado',
        'user_id',
        'category_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'email', 
        'proposta',
        'mobile',
        'user_id'
    ];    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            $model->user_id =Auth()->id();
        });
    }
}

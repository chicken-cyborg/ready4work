<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Proposta extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'role',
        'email', 
        'estado',
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
            $model->name = Auth::user()->name;
            $model->email = Auth::user()->email;
            $model->role=Auth::user()->role;
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class mensagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mensagem', 
        'proposta_id',
        'usersend_id'
    ];

    public function proposta()
    {
        return $this->belongsTo(Proposta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'usersend_id');

    }

    

    
    

    public static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            $model->usersend_id =Auth()->id();
        });
    }




}

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

    public function propostas()
    {
        return $this->belongsTo(Proposta::class);
    }
    

    public static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            $model->usersend_id =Auth()->id();
        });
    }




}

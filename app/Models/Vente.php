<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    protected $fillable = ['date_vente','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

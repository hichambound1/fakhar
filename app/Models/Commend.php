<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commend extends Model
{
    use HasFactory;

    protected $fillable = ['date_cmd','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commend_elements()
    {
        return $this->hasMany(Commend_Element::class);
    }
}

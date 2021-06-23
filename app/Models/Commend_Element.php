<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commend_Element extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id','commend_id','quantitie','prix'
    ];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function commend()
    {
        return $this->belongsTo(Commend::class);
    }
}

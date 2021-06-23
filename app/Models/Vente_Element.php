<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente_Element extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id','vente_id','quantitie','prix'
    ];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }
}

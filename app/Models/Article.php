<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'published_at'];
    protected $dates = ['published_at'];

    // Getter
    public function getTitleAttribute($value) {
      return mb_strtoupper($value);
    }

    // Setter
    public function setTitleAttribute($value) {
      $this->attributes['title'] = mb_strtoupper($value);
    }
}

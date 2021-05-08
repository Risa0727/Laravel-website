<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'published_at'];
    protected $dates = ['published_at'];

    public function scopePublished($query) {
      $query->where('published_at', '<=', Carbon::now());
    }

    // Getter
    public function getTitleAttribute($value) {
      return mb_strtoupper($value);
    }

    // Setter
    public function setTitleAttribute($value) {
      $this->attributes['title'] = mb_strtoupper($value);
    }
}

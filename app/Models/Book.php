<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'description',
      'file_url',
      'category',
      'isbn',
      'author_id',
    ];

    protected $casts = [
      'created_at'  => 'date:d/m/Y H:i',
      'updated_at'  => 'date:d/m/Y H:i',
    ];

    public function author() : BelongsTo {
        return $this->belongsTo(Author::class);
    }


}

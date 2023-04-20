<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
      'first_name',
      'last_name',
      'country',
      'email',
    ];

    protected $casts = [
      'created_at'  => 'date:d/m/Y H:i',
      'updated_at'  => 'date:d/m/Y H:i',
    ];

    protected $appends = [
      'full_name'
    ];

    /**
     * Get the authors's full name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getFullNameAttribute(): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }
}

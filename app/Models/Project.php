<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function todos(): HasMany
    {
      return $this->hasMany(Todo::class);
    }

    // allow mass assignment in controller
    protected $fillable = ['name', 'description'];
}

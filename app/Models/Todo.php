<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    public static $rules = [
      'name' => 'required',
      'description' => 'required'
    ];

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
      return $this->belongsTo(Project::class);
    }

    // allow mass assignment in controller
    protected $fillable = ['name', 'description'];
}

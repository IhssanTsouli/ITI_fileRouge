<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['date' => 'datetime'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

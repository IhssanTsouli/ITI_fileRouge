<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;

    protected  $fillable = ['title', 'content', 'course_id', 'status', 'image', 'slug'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function content()
    {
        return $this->larabergContent();
    }

    public function messages()
    {
        return $this->morphMany('App\Models\Message', 'messageable')->with('user');
    }
}

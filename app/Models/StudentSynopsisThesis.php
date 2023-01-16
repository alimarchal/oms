<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentSynopsisThesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thesis_synopsis_type',
        'program',
        'thesis_title',
        'area_of_specialization',
        'supervisor',
        'synopsis_file',
        'thesis_document',
        'synopsis_approval_notification',
        'session',
        'defence_date',
        'submission_status',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'student_synopsis_thesis_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

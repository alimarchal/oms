<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incharge extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','student_synopsis_thesis_id'];

    public function student_thesis(): BelongsTo
    {
        return $this->belongsTo(StudentSynopsisThesis::class,'student_synopsis_thesis_id');
    }
}

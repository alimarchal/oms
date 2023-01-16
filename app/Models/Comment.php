<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['id','supervisor_id','comments','recommendation','required_again','student_synopsis_thesis_id'];

    public function thesis(): BelongsTo
    {
        return $this->belongsTo(StudentSynopsisThesis::class,'student_synopsis_thesis_id');
    }
}

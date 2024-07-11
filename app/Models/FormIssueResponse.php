<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormIssueResponse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function formResponse()
    {
        return $this->belongsTo(FormResponse::class);
    }
}

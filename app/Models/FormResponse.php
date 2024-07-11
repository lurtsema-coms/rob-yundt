<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function formIssueResponse()
    {
        return $this->hasMany(FormIssueResponse::class);
    }
}

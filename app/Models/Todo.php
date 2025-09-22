<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['keterangan','status','user_id','batas'];

    public function User() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

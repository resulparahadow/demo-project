<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type', 'file'];

    public function scopeBeforeCreated($q, $day)
    {
        $lastDay = Carbon::now()->subDays($day);

        $q->whereDate('created_at', '<', $lastDay);
    }

}

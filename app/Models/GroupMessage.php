<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;

class GroupMessage extends Model
{
    use HasFactory;

    public function hasPhoto()
    {
        return Storage::exists($this->photo);
    }

    public function photoUri()
    {
        return Storage::url($this->photo);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

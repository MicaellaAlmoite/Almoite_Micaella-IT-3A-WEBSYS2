<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'course',
        'year_level',
        'profile_picture'
    ];

    protected $appends = ['profile_picture_url', 'status'];

    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture && file_exists(public_path('storage/' . $this->profile_picture))) {
            return asset('storage/' . $this->profile_picture);
        }
        return 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . urlencode($this->name);
    }
}
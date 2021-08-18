<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function getFullAvatarImagePathAttribute()
    {
        $full_image_path =  url('/') . '/uploads/' . $this->avatar;
        return $full_image_path;
    }

    public function getFullLicenceImagePathAttribute()
    {
        $full_image_path =  url('/') . '/uploads/' . $this->driver_licence;
        return $full_image_path;
    }

    protected $appends = [
        'full_avatar_image_path', 'full_licence_image_path'
    ];
}

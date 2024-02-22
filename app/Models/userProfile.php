<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'company',
        'department',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrls extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'short_urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'code',
    ];
}

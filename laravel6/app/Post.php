<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   //  protected $table = 'myAppDB.post';
    protected $table = 'post';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content'
    ];
}

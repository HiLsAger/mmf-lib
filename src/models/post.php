<?php

namespace HiLsAger\MMF\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['id', 'name', 'content', 'author', 'status'];
}

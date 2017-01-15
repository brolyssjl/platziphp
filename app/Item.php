<?php

namespace PlatziPHP;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
  protected $fillable = ['title', 'description'];
}

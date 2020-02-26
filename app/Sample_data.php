<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample_data extends Model
{
public $table = 'sample_data';

 protected $fillable = [
 	'name','age'
 ];
}

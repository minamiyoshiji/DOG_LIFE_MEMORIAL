<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
  use HasFactory;

  protected $table = 'users_dogs';

  protected $fillable = [
    'dog_name','user_id', 'birth', 'breed',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function dog_dates() {
  return $this->hasMany(Dog_date::class, 'dog_id');
  }

}

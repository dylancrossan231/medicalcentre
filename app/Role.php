<?php
# @Date:   2019-11-04T15:29:25+00:00
# @Last modified time: 2019-11-07T12:54:35+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Role extends Model
{
  public function users(){
    return $this->belongsToMany("App\User", 'user_role');
  }
}

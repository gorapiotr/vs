<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shelter
 * @package App
 *
 * @property    string      $name
 * @property    string      $city
 * @property    int         $size
 */
class Shelter extends Model
{
    protected $table = 'shelters';

    protected $fillable = [
        'uskey',
        'name',
        'city',
        'size'
    ];

    public function workers()
    {
        return $this->hasMany('App\Worker');
    }

    public function cats()
    {
        return $this->hasMany('App\Cat');
    }

    public static function generateUSKey()
    {
        return str_random(5);
    }
}

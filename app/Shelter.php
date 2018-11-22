<?php

namespace App;

use App\Helpers\USKeyGenerator;
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
    use USKeyGenerator;

    protected $table = 'shelters';

    protected $fillable = [
        'uskey',
        'name',
        'city',
        'size'
    ];

    /**
     * Get all shelter workers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany('App\Worker');
    }

    /**
     * Get all shelter cats
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cats()
    {
        return $this->hasMany('App\Cat');
    }
}

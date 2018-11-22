<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Worker
 * @package App
 *
 * @property    string      $name
 * @property    int         $age
 */
class Worker extends Model
{
    protected $table = "workers";

    protected $fillable = [
        'name',
        'age'
    ];

    protected $guarded = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cats()
    {
        return $this->hasMany('App\Cat');
    }

    public  function shelter()
    {
        return $this->belongsTo('App\Shelter', 'shelter_id');
    }
}

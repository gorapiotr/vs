<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cat
 * @package App
 *
 * @property    string $id
 * @property    string $name
 * @property    string $color
 */
class Cat extends Model
{
    protected $table = "cats";

    protected $fillable = [
        'name',
        'color'
    ];

    protected $guarded = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guardian()
    {
        return $this->belongsTo('App\Worker', 'worker_id');
    }

    public  function shelter()
    {
        return $this->belongsTo('App\Shelter', 'shelter_id');
    }

}

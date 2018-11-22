<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 18:43
 */

namespace App\Presenter;


use App\Shelter;
use Illuminate\Http\Resources\Json\Resource;

class ShelterInfoPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Shelter $this */
        return [
            'name' => $this->name,
            'city' => $this->city
        ];
    }
}

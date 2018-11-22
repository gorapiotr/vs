<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 17:48
 */

namespace App\Presenter;


use App\Cat;
use Illuminate\Http\Resources\Json\Resource;

class CatInfoPresenter extends Resource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Cat $this */
        return [
            'name' => $this->name,
            'color' => $this->color
        ];
    }
}

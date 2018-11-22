<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 17:47
 */

namespace App\Presenter;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CatCollectionPresenter extends ResourceCollection
{

    /**
     * Transform the resource into a JSON array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return CatInfoPresenter::collection($this->collection)->collection->toArray();
    }
}

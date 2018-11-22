<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 22.11.2018
 * Time: 18:42
 */

namespace App\Presenter;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ShelterCollectionPresenter extends ResourceCollection
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
        //dd(ShelterInfoPresenter::collection($this->collection)->collection->jsonSerialize());
        return ShelterFullInfoPresenter::collection($this->collection)->collection->jsonSerialize();
    }
}
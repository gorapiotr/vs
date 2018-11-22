<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Presenter\CatCollectionPresenter;
use App\Presenter\CatInfoPresenter;

class CatController extends Controller
{
    /**
     * Get list all cats in database
     *
     * @return CatCollectionPresenter|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cats = Cat::all();

        if ($cats->isNotEmpty()) {
            return new CatCollectionPresenter($cats);
        } else {
            return response()->json(['msg' => 'Not found cats']);
        }
    }

    /**
     * Show cat by $id
     *
     * @param int $catId
     * @return CatInfoPresenter|\Illuminate\Http\JsonResponse
     */
    public function show(int $catId)
    {
        /** @var Cat $cat */
        $cat = Cat::find($catId);

        if($cat) {
            return new CatInfoPresenter($cat);
        } else {
            return response()->json(['msg' => 'Not found cat']);
        }
    }

}

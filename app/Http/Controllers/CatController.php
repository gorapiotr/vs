<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Presenter\CatCollectionPresenter;
use App\Presenter\CatInfoPresenter;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::all();

        if ($cats->isNotEmpty()) {
            return new CatCollectionPresenter($cats);
        } else {
            return response()->json(['msg' => 'Not found cats']);
        }
    }

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

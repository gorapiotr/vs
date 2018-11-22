<?php

namespace App\Http\Controllers;

use App\Presenter\ShelterCollectionPresenter;
use App\Presenter\ShelterInfoPresenter;
use App\Shelter;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function index()
    {
        $shelters = Shelter::orderBy('name', 'asc')->get();

        if ($shelters->isNotEmpty()) {
            return new ShelterCollectionPresenter($shelters);
        } else {
            return response()->json(['msg' => 'Not found shelters']);
        }
    }

    public function show(string $shelterUsKey)
    {
        /** @var Shelter $shelter */
        $shelter = Shelter::where('uskey', '=',$shelterUsKey)->first();

        if($shelter) {
            return new ShelterInfoPresenter($shelter);
        } else {
            return response()->json(['msg' => 'Not found shelter']);
        }
    }
}

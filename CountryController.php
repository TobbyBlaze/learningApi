<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CountryModel;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);
    }

    public function countryById($id){
        return response()->json(CountryModel::find($id), 200);
    }

    public function countrySave(Request $request){
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    public function countryUpdate(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json('No data', 404);
        }
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function countryDelete(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json('No data', 200);
        }
        $country->delete($request->all());
        return response()->json($country, 200);
    } 
}

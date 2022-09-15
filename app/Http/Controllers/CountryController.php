<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    //
    public function getAllCountriesWithInfo(){
        $getAllCountries = Http::get('https://date.nager.at/api/v3/AvailableCountries');

        return view('holidays.countries')->with('countries', json_decode($getAllCountries));
    }

    public function getCountryInfoWithHolidays($countryCode){

        $getCountryInfo = Http::get('https://date.nager.at/api/v3/CountryInfo/'.$countryCode);
        
        $countryInfo = json_decode($getCountryInfo);
        if(isset($countryInfo->title)){
            $error = $countryInfo->title;
            $statusCode = 404;
            return response()->view('errors.error', compact('error', 'statusCode'), 404);
        }
        return view('holidays.country')->with('country', json_decode($getCountryInfo));

    }
}

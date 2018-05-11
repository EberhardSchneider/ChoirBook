<?php

namespace App\Http\Controllers;

use Geocoder\Query\GeocodeQuery;
use Geocoder\Query\ReverseQuery;

use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function search(Request $request) {
        $httpClient = new \Http\Adapter\Guzzle6\Client();
        $provider = new \Geocoder\Provider\GoogleMaps\GoogleMaps($httpClient);
        $geocoder = new \Geocoder\StatefulGeocoder($provider, 'de');

        $searchTerm = $request->input('search');

        dump($geocoder->geocodeQuery(GeocodeQuery::create('Buckingham Palace, London')));
    }
}

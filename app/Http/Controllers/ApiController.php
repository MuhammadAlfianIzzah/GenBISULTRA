<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ApiController extends Controller
{
    public function index()
    {
        try {
            $endpoint = "https://api.ipify.org/?format=json";
            $client = new \GuzzleHttp\Client();


            $response = $client->request('GET', $endpoint, []);

            // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody(), true);
        } catch (\Throwable $th) {
            $content  = null;
        }
        if ($content != null) {
            $position = Location::get($content["ip"]);
            if ($position !=  false) {
                $maps = "https://maps.google.com/?q=" . $position->latitude . "," . $position->longitude;
                $position->link_google_maps = $maps;
                return response([
                    "code" => 200,
                    "message" => "alamat ditemukan",
                    "data" =>  $position
                ], 200);
            } else {
                return response([
                    "code" => 404,
                    "message" => "Ip tidak terdeteksi",
                    "data" =>  []
                ], 404);
            }
            dd($position);
        } else {
            return response([
                "code" => 404,
                "message" => "alamat tidak ditemukan",
                "data" =>  []
            ], 404);
        }
    }
}

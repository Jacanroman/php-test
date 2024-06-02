<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class UserServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function showAll()
    {
        try{
            $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0')->json();
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        //I noticed that return null even if the request is bad
        //so i will add an error message when the response is null
        $data = [];
        if(!is_null($response)){
            foreach ($response['results'] as $pokemon) {
                //dd($pokemon);
                $data[] = [
                    "pokemon_id" => explode("/", $pokemon['url'])[6],
                    "name" => $pokemon['name'],
                ];
            }
        }

        $final_array=[];
        $final_array['data'] = $data;
        $final_array['error'] = (is_null($response)) ? "No data found" : null;

        return $final_array;
    }

    public function show(int $id)
    {

        try{
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$id}")->json();

        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        //do the logic to take the data for the response

        $data =[];
        if(!is_null($response)){
            $data['pokemon_name'] = $response['name'];
            $data['height'] = $response['height'];
            $data['weight'] = $response['weight'];

            //filter for the abilites using array_filter
            $filtered = array_filter(array_column($response['abilities'], 'ability'));
            $abilities = array_filter(array_column($filtered, 'name'));

            $data['abilities'] = $abilities;

            //take the images for the sprites

            foreach ($response['sprites'] as $item){
                if(!is_null($item) && !is_array($item)){
                    $data['images'][]=$item;
                }
            }

        }

        $final_array=[];
        $final_array['data'] = $data;
        $final_array['error'] = (is_null($response)) ? "No data found for that Pokemon" : null;

        dd($final_array);

        //I won't add more data due I don't have enough time

        return $final_array;

    }





}

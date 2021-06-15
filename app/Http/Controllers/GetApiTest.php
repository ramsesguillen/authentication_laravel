<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetApiTest extends Controller
{

    public string $apiUrl;


    public function __construct()
    {
        $this->apiUrl = 'http://ec2-18-222-140-64.us-east-2.compute.amazonaws.com/api';
    }



    public function register()
    {
        $response = Http::post($this->apiUrl . "/register", [
            'name' =>  'test2',
            'email' =>  'Atest2@test.com',
            'password' =>  'A1q2w3e4r#',
            'password_confirmation' =>  '1q2w3e4r#',
        ]);
        dd( $response->collect(), $response->status() );//
    }


    public function login()
    {
        $response = Http::post($this->apiUrl . "/login", [
            'email' =>  'Atest1@test.com',
            'password' =>  'A1q2w3e4r#',
        ]);
        dd( $response->collect(), $response->status() );//
    }


    public function logout()
    {
        $response =Http::withToken('5|HuK2bET55oOjSWMGgqPg8H2Ob5FBURYKxbBFtmik')->get($this->apiUrl . "/logout");
        dd( $response->collect(), $response->status() );//
    }



    public function get()
    {
        $response =Http::withToken('3|nkXD8jShiBHQWKERY36zXbLzzJN2O8EZIfRSGs8m')->get($this->apiUrl . "/users");
        dd( $response->collect() );//
        return $response;
    }



    public function getOne()
    {
        $response =Http::withToken('3|nkXD8jShiBHQWKERY36zXbLzzJN2O8EZIfRSGs8m')
        ->get($this->apiUrl . "/users/4");
        dd( $response->collect(), $response->status() );//
    }


    public function put()
    {
        $response =Http::withToken('3|nkXD8jShiBHQWKERY36zXbLzzJN2O8EZIfRSGs8m')
        ->put($this->apiUrl . "/users/4",[
            'name' =>  'test1[UPDATED]',
            'email' =>  'Atest1@test.com',
            'password' =>  'A1q2w3e4r#',
            'password_confirmation' =>  '1q2w3e4r#',
        ]);
        dd( $response->collect(), $response->status() );//
    }


    public function delete()
    {
        $response =Http::withToken('3|nkXD8jShiBHQWKERY36zXbLzzJN2O8EZIfRSGs8m')
        ->delete($this->apiUrl . "/users/5");
        dd( $response->collect(), $response->status() );//
    }
}

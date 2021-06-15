<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetApiController extends Controller
{



    public function get()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        dd( $response->collect() );//
        return $response;
    }

    public function getOne()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/1');
        dd( $response );//
    }

    public function post()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' =>  'test 1 laravel',
            'body' =>  'lorem ipsum',
            'userId' =>  1,
        ]);
        dd( $response->collect(), $response->status() );//
    }


    public function put()
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1', [
            'title' =>  'test 1 laravel updated',
            'body' =>  'lorem ipsum',
            'userId' =>  1,
        ]);
        dd( $response->collect(), $response->status() );//
    }


    public function delete()
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/1');
        dd( $response->collect(), $response->status() );//
    }
}

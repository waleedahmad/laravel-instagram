<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->instagram){
                $this->client = new Client([
                    'base_uri' => 'https://api.instagram.com/v1/',
                    'query' => [
                        'access_token' => Auth::user()->instagram->access_token
                    ]
                ]);
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('index')
            ->with('user', $this->getUser()->data)
            ->with('posts', $this->getPosts()->data);
    }

    public function search(Request $request){
        return view('search')
            ->with('posts', $this->getTagPosts($request->tag)->data);
    }

    public function getUser(){
        if(Auth::user()->instagram){
            try {
                $response = $this->client->request('GET', 'users/self/');
                return json_decode($response->getBody()->getContents());
            } catch (GuzzleException $e) {
                dd($e);
            }
        }else{
            return false;
        }
    }

    public function getPosts(){
        if(Auth::user()->instagram){
            try {
                $response = $this->client->request('GET', 'users/self/media/recent/');
                return json_decode($response->getBody()->getContents());
            } catch (GuzzleException $e) {
                dd($e);
            }
        }else{
            return false;
        }
    }

    public function getTagPosts($tags){
        if(Auth::user()->instagram){
            try {
                $response = $this->client->request('GET', 'tags/'.$tags.'/media/recent/');
                return json_decode($response->getBody()->getContents());
            } catch (GuzzleException $e) {
                dd($e);
            }
        }else{
            return false;
        }
    }
}

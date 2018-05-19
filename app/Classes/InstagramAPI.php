<?php

namespace App\Classes;

use GuzzleHttp\Client;

class InstagramAPI{

    private $client;
    private $access_token;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.instagram.com/v1/',
        ]);
    }

    public function setAccessToken($token){
        $this->access_token = $token;
    }

    public function getUser(){
        if($this->access_token){
            $response = $this->client->request('GET', 'users/self/', [
                'query' => [
                    'access_token' =>  $this->access_token
                ]
            ]);
            return json_decode($response->getBody()->getContents())->data;
        }
        return [];
    }

    public function getPosts(){
        if($this->access_token){
            $response = $this->client->request('GET', 'users/self/media/recent/', [
                'query' => [
                    'access_token' =>  $this->access_token
                ]
            ]);
            return json_decode($response->getBody()->getContents())->data;
        }
        return [];
    }

    public function getTagPosts($tags){
        if($this->access_token){
            $response = $this->client->request('GET', 'tags/'.$tags.'/media/recent/', [
                'query' => [
                    'access_token' =>  $this->access_token
                ]
            ]);
            return json_decode($response->getBody()->getContents())->data;
        }
        return [];
    }
}
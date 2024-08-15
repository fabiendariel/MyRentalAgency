<?php

namespace App\Http\Controllers;

use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show(Request $request, string $path) 
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => 'public/storage',
            'cache' => 'public/storage',
            'cache_path_prefix' => '.cache',
            'base_url' => 'images',
        ]);
        //dd($server->getSourcePath($path));
        return $server->getImageResponse($path, request()->except(['expires', 'signature']));
    }
}

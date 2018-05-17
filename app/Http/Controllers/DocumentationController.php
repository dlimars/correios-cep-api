<?php

namespace App\Http\Controllers;

use App\Repositories\Cep\CepRepository;
use League\Fractal\Manager;

class DocumentationController extends Controller
{
    public function index()
    {
        $contents = \Cache::rememberForever('documentation', function(){
            $markdown = file_get_contents(base_path('readme.md'));
            return (new \Parsedown())->parse($markdown);
        });

        return view('documentation', compact('contents'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index() {

        $majina = [
            [
                'id' => 1,
                'name' => 'Rashid Seif',
                'age' => 30,
                'role'=> 'manager'
            ],
            [
                'id' => 2,
                'name' => 'John Doe',
                'age' => 25,
                'role'=> 'assistant manager'
            ],
            [
                'id' => 1,
                'name' => 'Hero Suba',
                'age' => 50,
                'role'=> 'former manager'
            ],
          ];
        return Inertia::render('Chat/VHome', ['jina'=>$majina]);
    }
}

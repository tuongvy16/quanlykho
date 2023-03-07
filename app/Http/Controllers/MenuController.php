<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function getURL(Request $request)
    {
        $routeName = $request->query->get('name', 'dashboard');
        if (Route::has($routeName)) {
            return response()->json(route($routeName));
        }
        return response()->json("404");
    }
}

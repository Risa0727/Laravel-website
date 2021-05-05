<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index() {
      // return 'Hello World!';
      $message = 'Hello Laravel!!';
      return view('hello', ['message' => $message]);
    }
}

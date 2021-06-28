<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    //
    public function index() {

      $tests = DB::table('tests')->get();
      // var_dump($tests);

      // return 'Hello World!';
      $message = 'Hello Laravel!!';
      // return view('hello', ['message' => $message, compact('tests')]);
      return view('hello', compact('tests'));
    }
    public function hoge1 () {
      $tests = DB::table('tests')->orderBy('name', 'ASC')->get();

      return view('hello', compact('tests'));
    }

}

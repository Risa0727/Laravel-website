<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function about() {
      // set array
      $data = [];
      $data['first_name'] = 'Risa';
      $data['last_name'] = 'Skywalker';

      return view('pages.about', $data);
      // return view('pages.about');
    }


    public function contact() {
      return view('pages.contact');
    }

    public function memo() {
      return view('pages.memo');
    }
}

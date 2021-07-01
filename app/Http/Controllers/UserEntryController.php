<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEntry;

class UserEntryController extends Controller
{
   public function index() {
     $all = UserEntry::all();
     // dd($all);

     $entry = UserEntry::find(3);
     // dump($entry);

     $entry_list = UserEntry::where('id', '>', 2)->get();
     dump($entry_list);
   }
   public function detail($id) {
     $item = UserEntry::find($id);
     return view('pages.user_entry_detail', ['item' => $item]);
   }
}

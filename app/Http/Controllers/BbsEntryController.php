<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsEntry;

class BbsEntryController extends Controller
{
    public function index() {
      // dd(BbsEntry::all());
      $items = BbsEntry::orderBy("id", 'desc')->get();

      return view('bbs/bbs_entry_list', [
        "items" => $items
      ]);
    }

    public function create(Request $request) {
      $input = $request->only('author', 'title', 'body');
      // dd($input);
      $entry = new BbsEntry();
      $entry->author = $input['author'];
      $entry->title = $input['title'];
      $entry->body = $input['body'];
      $entry->save();

      return redirect('/bbs');
    }
}

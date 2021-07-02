<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsEntry;
use Validator;

class BbsEntryController extends Controller
{
    public function index() {
      // dd(BbsEntry::all());
      // $items = BbsEntry::orderBy("id", 'desc')->get();
      $items = BbsEntry::orderBy("id", 'desc')->paginate(10);

      return view('bbs/bbs_entry_list', [
        "items" => $items
      ]);
    }

    public function create(Request $request) {
      $input = $request->only('author', 'title', 'body');

      $validator = Validator::make($input, [
        'author' => 'required|string|max:30',
        'title' => 'required|string|max:30',
        'body' => 'required|string|max:100',
      ]);

      if ($validator->fails()) {
        return redirect('/bbs')->withErrors($validator);
      }

      // dd($input);
      $entry = new BbsEntry();
      $entry->author = $input['author'];
      $entry->title = $input['title'];
      $entry->body = $input['body'];
      $entry->save();

      return redirect('/bbs');
    }
}

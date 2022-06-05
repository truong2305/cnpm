<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use Illuminate\Http\Request;

class ContructionController extends Controller
{
    //
    public function addConstruction(Request $req)
    {
        $construction = new Construction();
        $construction->title = $req->title;
        $construction->date = $req->date;
        $construction->month = $req->month;
        $construction->year = $req->year;
        $construction->content = $req->content;
        $images = [];
        foreach($req->file('imgs') as $file) {
            $imgName = $file->getClientOriginalName();
            $path = time().'.'.$imgName;
            $file->move(public_path('/constructions'), $path);
            $images[] = $path;
        }
        $construction->imgs = json_encode($images);
        $construction->save();
    }

    public function getConstructions() {
        $list = Construction::all();
        return response()->json($list);
    }
}

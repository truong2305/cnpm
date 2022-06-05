<?php

namespace App\Http\Controllers;

use App\Models\Infomation;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Info;

use function GuzzleHttp\Promise\all;

class InfomationController extends Controller
{
    //
    public function getInfomations() {
        $info = Infomation::first();
        return response()->json($info);
    }
    public function updateInfomations(Request $req) {
        return $req->all();
        $info = Infomation::first();
        $info->delete();
        $newInfo = new Infomation();
        $newInfo->fill($req->all());
        $newInfo->save();
        return response()->json($newInfo);
        
    }
}

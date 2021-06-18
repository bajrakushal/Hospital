<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FetchController extends Controller
{
    public function GetDoctor($id){
        return json_encode(DB::table('users')->where('id', $id)->get());
    }
}

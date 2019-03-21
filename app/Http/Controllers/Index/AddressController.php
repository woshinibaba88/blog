<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /*
    * @地址管理
    * */
    public function Address()
    {
        return view("address.address");
    }
}

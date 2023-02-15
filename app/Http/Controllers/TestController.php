<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function process()
    {
        return view('process.index');
    }
    public function process2()
    {
        return view('process.edit');
    }
    public function process3()
    {
        return view('process.view');
    }

    public function step()
    {
        return view('steps.index');
    }

    public function insurance()
    {
        return view('insurance.index');
    }
    
}

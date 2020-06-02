<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function newsLetter()
    {
        return view('Admin.news.newsletter', []);
    }
}
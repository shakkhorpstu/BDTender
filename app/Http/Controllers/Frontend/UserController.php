<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:web');
  }
  public function index()
  {
    return redirect()->route('user.tender.index');
  }
}

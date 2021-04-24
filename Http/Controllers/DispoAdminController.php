<?php

namespace Modules\DisposableRanks\Http\Controllers;

use App\Contracts\Controller;

class DispoAdminController extends Controller
{
  public function admin()
  {
    return view('DisposableRanks::admin');
  }
}

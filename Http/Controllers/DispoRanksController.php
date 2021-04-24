<?php

namespace Modules\DisposableRanks\Http\Controllers;

use App\Contracts\Controller;
use App\Repositories\RankRepository;
use Nwidart\Modules\Facades\Module;

class DispoRanksController extends Controller
{
  private $rankRepo;

  public function __construct(
      RankRepository $rankRepo
  ) {
      $this->rankRepo = $rankRepo;
  }

  // Ranks
  // List All Ranks with their details
  // Return collection
  public function ranks()
  {
    $DisposableAirlines = Module::find('DisposableAirlines');
    if($DisposableAirlines) {
      $DisposableAirlines = $DisposableAirlines->isEnabled();
    }

    $ranks = $this->rankRepo->orderby('hours')->get() ;
    return view('DisposableRanks::ranks',[
      'ranks'  => $ranks,
      'dispal' => $DisposableAirlines,
    ]);
  }
}

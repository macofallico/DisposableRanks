<?php

namespace Modules\DisposableRanks\Http\Controllers;

use App\Contracts\Controller;
use App\Repositories\AwardRepository;

class DispoAwardsController extends Controller
{
  private $awardRepo;
  private $rankRepo;

  public function __construct(
      AwardRepository $awardRepo
  ) {
      $this->awardRepo = $awardRepo;
  }

  // Awards
  // List All Awards with their details
  // Return Collection
  public function awards()
  {
    $awards = $this->awardRepo->orderby('name')->get() ;
    return view('DisposableRanks::awards',['awards' => $awards]) ;
  }
}

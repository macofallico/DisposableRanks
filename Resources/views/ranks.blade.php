@extends('app')
@section('title', __('DisposableRanks::common.ranks'))

@section('content')
  <div class="row">
    <div class="col">
    {{-- <h3 class="card-title">@lang('DisposableRanks::common.ranks')</h3> --}}
    </div>
  </div>
  {{-- Ranks Table --}}
  <div class="card mb-2">
    <div class="card-header p-1">
      <h5 class="m-1 p-0">
        {{ config('app.name') }} | @lang('DisposableRanks::common.ranks')
        <i class="fas fa-tags float-right"></i>
      </h5>
    </div>
    <div class="card-body p-0">
      <table class="table table-sm table-borderless table-striped text-center mb-0">
        <tr>
          <th>&nbsp;</th>
          <th class="text-left">@lang('DisposableRanks::common.rtitle')</th>
          <th>@lang('DisposableRanks::common.minhour')</th>
          <th>@lang('DisposableRanks::common.payacars')</th>
          <th>@lang('DisposableRanks::common.paymanual')</th>
          <th>@lang('DisposableRanks::common.image')</th>
          <th>@lang('DisposableRanks::common.restrict')</th>
          <th>&nbsp;</th>
        </tr>
        @foreach($ranks as $rank)
          <tr>
            <td>&nbsp;</td>
            <td class="text-left align-middle">{{ $rank->name }}</td>
            <td class="align-middle">{{ $rank->hours }}</td>
            <td class="align-middle">{{ number_format($rank->acars_base_pay_rate) }} {{ setting('units.currency') }}</td>
            <td class="align-middle">{{ number_format($rank->manual_base_pay_rate) }} {{ setting('units.currency') }}</td>
            <td class="align-middle">
              @if($rank->image_url)
                <img src="{{ $rank->image_url }}" title="{{ $rank->name }}" class="rounded img-mh30 ml-1 mr-1">
              @endif
            </td>
            <td class="align-middle">
              @if($rank->subfleets->count() > 0)
                @lang('DisposableRanks::common.allowedsf') {{ $rank->subfleets->count() }}
              @else
                @lang('DisposableRanks::common.allowedno')
              @endif
            </td>
            <td>
              @if($rank->subfleets->count() > 0)
                <i class="fas fa-angle-double-down ml-1 mr-2" type="button" data-toggle="collapse" aria-expanded="false"
                    data-target="#subfleets-{{ $rank->id }}" aria-controls="subfleets-{{ $rank->id }}"
                    title="@lang('DisposableRanks::common.showhide')">
                </i>
              @endif
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  {{-- Rank Boxes --}}
  <div class="row row-cols-3">
    @foreach($ranks as $rank)
    <div id="subfleets-{{ $rank->id }}" class="collapse">
      @if($rank->subfleets->count() > 0)
        <div class="col">
          <div class="card mb-2">
            <div class="card-header p-1">
              <h5 class="m-1 p-0">
                {{ $rank->name }}
                <i class="fas fa-tag float-right"></i>
              </h5>
            </div>
            <div class="card-body p-1">
              @foreach($rank->subfleets as $subfleet)
                @if($dispal)
                  <a href="{{ route('DisposableAirlines.dsubfleet', [$subfleet->type]) }}">
                @endif
                  <b>&bull; {{ $subfleet->name }} | {{ $subfleet->airline->name }} [@lang('common.aircraft'): {{ $subfleet->aircraft->count() }}]</b>
                @if($dispal)
                  </a>
                @endif
                <br>
              @endforeach
            </div>
            <div class="card-footer text-right p-1">
              @lang('DisposableRanks::common.minhour'): {{ $rank->hours }}
            </div>
          </div>
        </div>
      @endif
    </div>
    @endforeach
  </div>
@endsection

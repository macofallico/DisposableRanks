@extends('app')
@section('title', __('DisposableRanks::common.ranks'))

@section('content')
  <div class="row">
    <div class="col">
    {{-- <h3 class="card-title">@lang('DisposableRanks::common.ranks')</h3> --}}
    </div>
  </div>

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
          </tr>
        @endforeach			
      </table>
    </div>
  </div>
@endsection

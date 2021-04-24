@extends('app')
@section('title', __('DisposableRanks::common.awards'))

@section('content')
  <div class="row">
    <div class="col">
    {{-- <h3 class="card-title">@lang('DisposableRanks::common.awards')</h3> --}}
    </div>
  </div>

  <div class="row row-cols-4">
    @foreach($awards as $award)
      <div class="col">
        <div class="card mb-2">
          <div class="card-header p-1">
            <h5 class="m-1 p-0">
              {{ $award->name }}
              <i class="fas fa-trophy float-right"></i>
            </h5>
          </div>
          <div class="card-body p-1 text-center">
            @if($award->image_url)
              <img class="img-mh150" src="{{ $award->image_url }}" title="{{ $award->description }}">
            @endif
          </div>
          <div class="card-footer p-1 text-center">
            {{ $award->description }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

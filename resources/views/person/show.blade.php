@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="row">
      <div class="col-12 text-center my-5">
        <h5>{{ $person->name }} {{ $person->surname }}</h5>
        <p class="text-muted">{{ $person->b_date }}</p>
        <a href="{{route('person.edit', $person)}}" type="button" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
      </div>

      <div class="row">
        <div class="col-12 mb-3">
          <p class="mb-0">{{ __('Director')}}</p>
          <p class="text-muted">
            @foreach($person->directors->sortByDesc('pivot.rating') as $director)
              {{ $director->name }} ({{ $director->pivot->rating }})
            @endforeach
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-3">
          <p class="mb-0">{{ __('Writer')}}</p>
          <p class="text-muted">
            @foreach($person->writers->sortByDesc('pivot.rating') as $writer)
              {{ $writer->name }} ({{ $writer->pivot->rating }})
            @endforeach
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-3">
          <p class="mb-0">{{ __('Stars')}}</p>
          <p class="text-muted">
            @foreach($person->stars->sortByDesc('pivot.rating') as $star)
              {{ $star->name }} ({{ $star->pivot->rating }})
            @endforeach
          </p>
        </div>
      </div>

      <h5>{{ __('Films')}}</h5>
      <hr class="mt-0 mb-4">
      <div class="row">
        <div class="col-12 mb-3">
        <p class="text-muted">
            @foreach($person->films as $film)
              {{ $film->name }}
            @endforeach
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection
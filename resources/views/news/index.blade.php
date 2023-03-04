@extends('layouts.main')
@section('content')
<h2>Список новостей</h2>
<div class="row mb-2">
@forelse($news as $n)
<div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">{{ $n->author ?? '' }}</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="{{ route('news.show',['id'=> $n['id']])}}">{{ $n->title ?? '' }}</a>
              </h3>
              <div class="mb-1 text-muted">{{ $n->created_at }}</div>
              <p class="card-text mb-auto">{!!$n->description!!}</p>
              <a href="{{ route('news.show',['id'=> $n['id']])}}">Читать далее</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" style="width: 200px" src="{{ Storage::disk('public')->url($n->image) }}">
          </div>
        </div>
@empty
    <h2>Новостей нет</h2>
@endforelse
    {{ $news->links() }}
</div>
@endsection

@extends('layouts.main')
@section('content')
<h2>News categories</h2>
<div class="row mb-2">
@foreach($categories as $n)
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <a class="text-dark" href="{{ route('news.category',['category_id'=> $n['category_id']]) }}">{{ $n['caption'] }}</a>
              </h3>
              <a href="{{ route('news.category',['category_id'=> $n['category_id']]) }}">Новости</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
          </div>
        </div>
      
   
@endforeach
</div>
@endsection


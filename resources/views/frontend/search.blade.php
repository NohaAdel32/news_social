@extends('layouts.frontend.app')

@section('content')
 <!-- Main News Start-->
 <br><br><br>
 <div class="main-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="mn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="mn-title">
                <a href="{{ route('frontend.show.post',$post->slug) }}" title="{{ $post->title }}">{{ $post->title }}</a>
              </div>
            </div>
          </div>
        @empty
           <div class="alert-info" >
          Not found data
           </div>
        @endforelse
        {{$posts->links()}}
          </div>
        </div>

  
      </div>
    </div>
  </div>
  <!-- Main News End-->
@endsection
@section('title')
{{ config('app.name') }} | Search
@endsection
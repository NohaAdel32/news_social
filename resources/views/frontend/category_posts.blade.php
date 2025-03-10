@extends('layouts.frontend.app')
@section('content')
 <!-- Main News Start-->
 <br><br><br>
 <div class="main-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="mn-img">
              <img src="{{ $post->images->first()->path }}" />
              <div class="mn-title">
                <a href="" title="{{ $post->title }}">{{ $post->title }}</a>
              </div>
            </div>
          </div>
        @empty
           <div class="alert-info" >
            Category is empty
           </div>
        @endforelse
        {{$posts->links()}}
          </div>
        </div>

        <div class="col-lg-3">
          <div class="mn-list">
            <h2>Other Category</h2>
            <ul>
      @foreach ($categories as $category)
      <li><a href="{{ route('frontend.category_posts',$category->slug) }}">{{ $category->name }}</a></li>
      @endforeach
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main News End-->
@endsection
@section('title')
{{ $category->name }}
@endsection
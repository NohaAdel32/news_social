@extends('layouts.frontend.app')
@section('content')
<!-- Top News Start-->
<div class="top-news">
  @php
  $latest_posts=$posts->take(3);
@endphp
    <div class="container">
      <div class="row">
        <div class="col-md-6 tn-left">
          <div class="row tn-slider">
            @foreach ($latest_posts as $post)
            <div class="col-md-6">
              <div class="tn-img">
                <img src="{{$post->images->first()->path}}" />
                <div class="tn-title">
                  <a href="">{{$post->title}}</a>
                </div>
              </div>
            </div>
            @endforeach
          
          </div>
        </div>
        <div class="col-md-6 tn-right">
          <div class="row">
            @php
              $four_posts=$posts->take(4);
            @endphp
            @foreach ($four_posts as $post)
            <div class="col-md-6">
              <div class="tn-img">
                <img src="{{$post->images->first()->path}}" />
                <div class="tn-title">
                  <a href="">{{$post->title}}</a>
                </div>
              </div>
            </div>
            @endforeach
            
          
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top News End-->

  <!-- Category News Start-->
  <div class="cat-news">
    <div class="container">
      <div class="row">
        @foreach ($categories_with_posts as $category)
        <div class="col-md-6">
          <h2>{{$category->name}} ({{ $category->posts->count() }} Posts)</h2>
          <div class="row cn-slider">
            @foreach ($category->posts as $post)
            <div class="col-md-6">
              <div class="cn-img">
                <img src="{{$post->images->first()->path}}" />
                <div class="cn-title">
                  <a href="">{{$post->title}}</a>
                </div>
              </div>
            </div>
            @endforeach
          
          </div>
        </div>
        @endforeach
        
      
      </div>
    </div>
  </div>
  <!-- Category News End-->

  <!-- Category News Start-->
 
  <!-- Category News End-->

  <!-- Tab News Start-->
  <div class="tab-news">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#featured"
                >Oldest News</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#popular"
                >Popular News</a
              >
            </li>
            
          </ul>

          <div class="tab-content">
            <div id="featured" class="container tab-pane active">
             @foreach ($oldest_posts as $post)
             <div class="tn-news">
              <div class="tn-img">
                <img src="{{$post->images->first()->path}}" />
              </div>
              <div class="tn-title">
                <a href="">{{$post->title}}</a>
              </div>
            </div>
             @endforeach
         
            </div>
            <div id="popular" class="container tab-pane fade">
              @foreach ($greatest_comments as $post)
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{$post->images->first()->path}}" />
                </div>
                <div class="tn-title">
                  <a href="">{{$post->title}}comments ({{$post->comments_count}})</a>
                </div>
              </div>
              @endforeach
              
            </div>
           
          </div>
        </div>

        <div class="col-md-6">
          <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="pill" href="#m-viewed"
                >Latest News</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="pill" href="#m-read"
                >Most Read</a
              >
            </li>
           
          </ul>

          <div class="tab-content">
          
            <div id="m-viewed" class="container tab-pane active">
            
            @foreach ($latest_posts as $post)
            <div class="tn-news">
              <div class="tn-img">
                <img src="{{$post->images->first()->path}}" />
              </div>
              <div class="tn-title">
                <a href="">{{$post->title}}</a>
              </div>
            </div>
            @endforeach
          
            </div>
            <div id="m-read" class="container tab-pane fade">
              @foreach ($greatest_views as $post )
              <div class="tn-news">
                <div class="tn-img">
                  <img src="{{$post->images->first()->path}}" />
                </div>
                <div class="tn-title">
                  <a href="">{{$post->title}}({{$post->num_of_views}})</a>
                </div>
              </div>
              @endforeach
             
             
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tab News Start-->

  <!-- Main News Start-->
  <div class="main-news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            @foreach ($posts as $post )
            <div class="col-md-4">
              <div class="mn-img">
                <img src="{{$post->images->first()->path}}" />
                <div class="mn-title">
                  <a href="">{{$post->title}}</a>
                </div>
              </div>
            </div>
            @endforeach
            {{$posts->links()}}
          </div>
        </div>

        <div class="col-lg-3">
          <div class="mn-list">
            <h2>Read More</h2>
            <ul>
              @foreach ($read_more_posts as $post)
              <li><a href="">{{$post->title}}</a></li>
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
Bootstrap News Template - Free HTML Templates
@endsection
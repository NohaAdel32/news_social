@extends('layouts.frontend.app')
@section('content')
<!-- Profile Start -->
<div class="dashboard container">
  <!-- Sidebar -->
  <aside class="col-md-3 nav-sticky dashboard-sidebar">
      <!-- User Info Section -->
      <div class="user-info text-center p-3">
          <img src="{{ asset(Auth::user()->image) }}" alt="User Image" class="rounded-circle mb-2"
              style="width: 80px; height: 80px; object-fit: cover" />
          <h5 class="mb-0" style="color: #ff6f61">{{ Auth::guard('web')->user()->name}}</h5>
      </div>

      <!-- Sidebar Menu -->
      <div class="list-group profile-sidebar-menu">
          <a href="./dashboard.html" class="list-group-item list-group-item-action active menu-item" data-section="profile">
              <i class="fas fa-user"></i> Profile
          </a>
          <a href="./notifications.html" class="list-group-item list-group-item-action menu-item" data-section="notifications">
              <i class="fas fa-bell"></i> Notifications
          </a>
          <a href="./setting.html" class="list-group-item list-group-item-action menu-item" data-section="settings">
              <i class="fas fa-cog"></i> Settings
          </a>
      </div>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
      <!-- Profile Section -->
      <section id="profile" class="content-section active">
          <h2>User Profile</h2>
          <div class="user-profile mb-3">
              <img src="{{ asset(Auth::guard('web')->user()->image) }}" alt="User Image" class="profile-img rounded-circle" style="width: 100px; height: 100px;" />
              <span class="username">{{ Auth::guard('web')->user()->name}}</span>
          </div>
          <br>
          @if (session()->has('errors'))
              <div class="alert alert-danger">
                @foreach (session('errors')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </div>
          @endif
   <form action="{{ route("frontend.dashboard.storePost") }}" method="post" enctype="multipart/form-data" >
             @csrf
          <!-- Add Post Section -->
          <section id="add-post" class="add-post-section mb-5">
              <h2>Add Post</h2>
            
                <div class="post-form p-3 border rounded">
                  <!-- Post Title -->
                  <input type="text" id="postTitle" class="form-control mb-2" placeholder="Post Title" name="title"/>

                  <!-- Post Content -->
                  <textarea id="postContent" class="form-control mb-2" rows="3" placeholder="What's on your mind?" name="desc"></textarea>

                  <!-- Image Upload -->
                  <input type="file" id="postImage" class="form-control mb-2" accept="image/*" multiple name="images[]"/>
                  <div class="tn-slider mb-2">
                      <div id="imagePreview" class="slick-slider"></div>
                  </div>

                  <!-- Category Dropdown -->
                  <select id="postCategory" class="form-select mb-2" name="category_id">
                      <option value="" selected>Select Category</option>
                     @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                  </select>

                  <!-- Enable Comments Checkbox -->
                  <label class="form-check-label mb-2">
                     &nbsp;&nbsp;&nbsp; <input type="checkbox" class="form-check-input" name="comment_able" /> Enable Comments
                  </label><br>

                  <!-- Post Button -->
                  <button class="btn btn-primary post-btn" type="submit">Post</button>
              </div>
          </section>
     </form>
          <!-- Posts Section -->
          <section id="posts" class="posts-section">
              <h2>Recent Posts</h2>
              <div class="post-list">
                  <!-- Post Item -->
                  @forelse ($posts as $post)
                     <div class="post-item mb-4 p-3 border rounded">
                      <div class="post-header d-flex align-items-center mb-2">
                          <img src="{{ asset(Auth::guard('web')->user()->image) }}" alt="User Image" class="rounded-circle" style="width: 50px; height: 50px;" />
                          <div class="ms-3">
                              <h5 class="mb-0">{{ Auth::guard('web')->user()->name}}</h5>
                          </div>
                      </div>
                      <h4 class="post-title">{{ $post->title }}</h4>
                      <p >{!! nl2br(chunk_split($post->desc,60)) !!}</p>

                      <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                              <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#newsCarousel" data-slide-to="1"></li>
                              <li data-target="#newsCarousel" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            @foreach ($post->images as $index=>$image)
                             <div class="carousel-item  @if($index==0)active @endif">
                                  <img src="{{ asset($image->path) }}" class="d-block w-100" alt="First Slide" height="500px">
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5>{!! $post->title !!}</h5>
                                   
                                  </div>
                              </div>    
                            @endforeach
                             
                   
                              <!-- Add more carousel-item blocks for additional slides -->
                          </div>
                          <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>

                      <div class="post-actions d-flex justify-content-between">
                          <div class="post-stats">
                              <!-- View Count -->
                              <span class="me-3">
                                  <i class="fas fa-eye"></i> {{ $post->num_of_views }}
                              </span>
                          </div>

                          <div>
                              <a href="{{ route('frontend.dashboard.editPost',$post->slug) }}" class="btn btn-sm btn-outline-primary">
                                  <i class="fas fa-edit"></i> Edit
                              </a>
                              <a href="post/delete/{{ $post->id }}" class="btn btn-sm btn-outline-primary"onclick="return confirm('Are you sure you want to delete?')">
                                  <i class="fas fa-thumbs-up"></i> Delete
                              </a>
                              <button class="btn btn-sm btn-outline-secondary">
                                  <i class="fas fa-comment"></i> Comments
                              </button>
                          </div>
                      </div>

                        <!-- Display Comments -->
                        <div class="comments">
                              <div class="comment">
                                  <img src="{{ asset('assets/frontend/img/news-825x525.jpg') }}" alt="User Image" class="comment-img" />
                                  <div class="comment-content">
                                      <span class="username"></span>
                                      <p class="comment-text">first comment</p>
                                  </div>
                              </div>
                          <!-- Add more comments here for demonstration -->
                         </div>
                  </div>  
                  @empty
                     <div class="alert alert-info">No Posts !</div> 
                  @endforelse
                 

                  <!-- Add more posts here dynamically -->
              </div>
          </section>
      </section>
  </div>
</div>
<!-- Profile End -->

@endsection
@section('title')
{{ config('app.name') }} | {{ Auth::user()->name }}
@endsection
@push('js')
<script>
$(document).ready(function() {
    // initialize with defaults
    $("#postImage").fileinput({
         theme: 'fa5',
          showCancel: true,
          showUpload:false,
    });

    // with plugin options
    $("#postImage").fileinput({'uploadUrl': '/path/to/your-upload-api', 'previewFileType': 'any'});

    $("#postContent").summernote({
        height: 300,
    });
    
});
</script>
@endpush
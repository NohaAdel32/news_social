@extends('layouts.frontend.app')
@section('content')
<div class="dashboard container">
    @include('frontend.includes.frontend.dashboard.sidbar')

    <!-- Main Content -->
    <div class="main-content col-md-9">
        <!-- Show/Edit Post Section -->
        <form action="{{ route('frontend.dashboard.updatePost',$post->slug) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section id="posts-section" class="content-section active">
                <h2>Your Posts</h2>
                <ul class="list-unstyled user-posts">
                    <!-- Example of a Post Item -->
                    <li class="post-item">
                        <!-- Editable Title -->
                        <input type="text" name="title" class="form-control mb-2 post-title"
                            value="{{ $post->title }}" />

                        <!-- Editable Content -->
                        <textarea id="postDesc" name="desc" class="form-control mb-2 post-content">
                {!! $post->desc !!}
            </textarea>



                        <!-- Image Upload Input for Editing -->
                        <input type="file" id="postImages" name="images[]" class="form-control mt-2 edit-post-image" accept="image/*"
                            multiple />

                        <!-- Editable Category Dropdown -->
                        <select name="category_id" class="form-control mb-2 post-category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($post->category_id==$category->id)>{{
                                $category->name }}</option>
                            @endforeach

                        </select>

                        <!-- Editable Enable Comments Checkbox -->
                        <div class="form-check mb-2">
                            <input class="form-check-input enable-comments" name="comment_able" type="checkbox"
                                @checked($post->comment_able==1) />
                            <label class="form-check-label">
                                Enable Comments
                            </label>
                        </div>

                        <!-- Post Meta: Views and Comments -->
                        <div class="post-meta d-flex justify-content-between">
                            <span class="views">
                                <i class="fas fa-eye"></i> {{ $post->num_of_views }}
                            </span>
                            <span class="post-comments">
                                <i class="fas fa-comment"></i> {{ $post->comments->count() }}
                            </span>
                        </div>

                        <!-- Post Actions -->
                        <div class="post-actions mt-2">
                           
                            <button type="submit" class="btn btn-success save-post-btn ">
                                Save
                            </button>
                            <a href="{{ route('frontend.dashboard.showProfile') }}" class="btn btn-secondary cancel-edit-btn ">
                                Cancel
                            </a>
                        </div>

                    </li>
                    <!-- Additional posts will be added dynamically -->
                </ul>
            </section>
        </form>
    </div>
</div>

@endsection
@section('title')
Edit | {{ $post->title }}
@endsection
@push('js')
<script>
    $(document).ready(function() {
        // initialize with defaults
        $("#postImages").fileinput({
            theme: 'fa5'
            , showCancel: false
            , showUpload: false
            , maxFileCount: 5,
            initialPreviewAsData: true
            , initialPreview: [
                @if($post -> images -> count() > 0)
                @foreach($post -> images as $image)
                "{{ asset($image->path )}}"
                , @endforeach

                @endif
            ]
            , initialPreviewConfig: [{
                caption: 'desert.jpg'
                , width: '120px'
                , url: '', // server delete action 

            }]
        , });
         $("#postDesc").summernote({
        height: 300,
    });

    });

</script>

@endpush
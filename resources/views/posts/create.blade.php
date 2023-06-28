@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('storeImage') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row ">
            <h1>Add New Post</h1>
        </div>
        <div class="row pt-5 ">
            <div class="col-8 offset-2">
                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label ">Image caption</label>

                    <div class="col-md-6">
                        <input id="caption"
                         type="text"
                         name="caption"
                         class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption') }}"
                          required autocomplete="caption" autofocus>

                          @error('caption')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">post image</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </div>
                <div class="row pt-3">
                    <button class="btn btn-primary">Add post</button>
                </div>

            </div>
            </div>
    </form>

</div>
@endsection

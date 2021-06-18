@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 offset-md-2 col-lg-8">

                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Create a Post</h3>

                        <form action="/posts" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titleinput">Title</label>
                                <input type="text" name="title" id="titleinput" class="form-control" placeholder="Your title">
                            </div>
                            <div class="form-group">
                                <label for="bodyinput">Description</label>
                                <textarea name="description" id="bodyinput" cols="30" rows="5" class="form-control" placeholder="Your description..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imageupload">Upload Image</label>
                                <input type="file" name="image" id="imageupload" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary block">Submit</button>
                            <a href="/posts" class="btn btn-link">Back</a>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
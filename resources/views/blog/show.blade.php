@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <a href="/posts" class="btn btn-info btn-large">Back</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <img src="{{ asset('images/'. $post->image_path ) }}" alt="" class="img-fluid" height="600px" width="400px">
            </div>
            <div class="col-sm-12 col-md-9">
                <h3>{{ $post->title }}</h3>
                <p>Created by {{ $post->user->name }} on {{ date('jS-m-Y', strtotime($post->updated_at)) }}</p>
                
                <p class="lead">{{ $post->description }}</p>
                
                
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center card-title">Leave a comment</h4>
                        <form action="">
                            
                            <div class="form-group">
                                <label for="guestName">Name</label>
                                <input type="text" name="name" id="guestName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="guestEmail">Email</label>
                                <input type="text" name="email" id="guestEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control"></textarea>
                            </div>
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div> --}}


@endsection
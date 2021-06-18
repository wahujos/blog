
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <h2 class="text-center">Blog Posts</h2>
        </div>
    </div>
    @if (Auth::check())
        <a href="/posts/create" class="btn btn-primary mb-4">Create New Post</a>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    {{-- @if ($errors->all())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif --}}
    
</div>

{{-- @forelse ($collection as $item)
    
@empty
    
@endforelse --}}

@forelse ($posts as $post)
    <div class="container border-bottom py-4">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <img src="{{ asset('images/'. $post->image_path) }}" alt="" class="img-fluid" height="200px" width="200px">
            </div>
            <div class="col-sm-12 col-md-9">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p>Created by {{ $post->user->name }} on {{ date('jS-m-Y', strtotime($post->updated_at)) }}</p>
                
                <p class="lead text-truncate">{{ $post->description }}</p>
                
                
            </div>
        </div>
        @if (Auth::check())
            @if (Auth::user()->id === $post->user_id)
                <div class="row">
                    <div class="col-sm-6 offset-sm-6 text-left">
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary d-inline-block mr-4">Edit</a>
                        <form action="/posts/{{ $post->id }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endif
        {{ $posts->links() }}
    </div>

    

    @empty
        <div class="container">
            <p class="lead">
                There are no posts currently.
            </p>
        </div>
    @endforelse



@endsection
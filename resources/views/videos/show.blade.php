@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $video->title }}</div>

                    <div class="card-body">
                        <video src="{{ $video->path }}" controls class="card-img-top" alt="..."></video>
                        <p>{{ $video->description }}</p>
                    </div>

                    <div class="card-footer text-muted">
                        Uploaded {{ $video->created_at->diffForHumans() }} by {{ $video->user->name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <a href="{{ route('videos.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <h4>Comments</h4>
                @forelse($video->comments as $comment)
                    <div class="card mt-2">
                        <div class="card-body">
                            <p class="card-text">{{ $comment->body }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <p>No comments yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="col-md-8 offset-md-5">
        <div class="row">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>{{ trans('label.name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ trans('label.name') }}" value="{{ $post->name }}"/>
                </div>
                <div class="form-group">
                    <label>{{ trans('label.detail') }}</label>
                    <textarea name="detail" class="form-control" placeholder="{{ trans('label.detail') }}">{{ $post->detail }}</textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('label.author') }}</label>
                    <input type="text" name="author" class="form-control" placeholder="{{ trans('label.author') }}" value="{{ $post->author }}">
                </div>
                    <button type="submit" class="btn btn-warning">{{ trans('label.update') }}</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-default">{{ trans('label.back') }}</a>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if (Session::get('danger'))
                <div class="alert alert-danger">
                    <p>{{ trans('label.message') }}</p>
                        {!! Session::get('danger') !!}
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">{{ trans('label.name') }}</label>
                    <input class="form-control" type="text" name="name" placeholder="{{ trans('label.name') }}"/>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ trans('label.detail') }}</label>
                    <textarea class="form-control" name="detail" placeholder="{{ trans('label.detail') }}"></textarea>
                    @error('detail')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">{{ trans('label.author') }}</label>
                    <input class="form-control" type="text" name="author" placeholder="{{ trans('label.author') }}"/>
                    @error('author')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">{{ trans('label.add') }}</button>
            </form>
        </div>
    </div>
@endsection

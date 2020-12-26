@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ trans('label.crud') }}</h1>
        </div>
    </div>
    @if (Session::get('success'))
        <div class="alert alert-success">
            <p>{{ trans('label.message') }}</p>
                {!! Session::get('success') !!}
        </div>
    @endif
    <div class="col-md-12 text-right">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>{{ trans('label.no') }}</th>
                <th>{{ trans('label.name') }}</th>
                <th>{{ trans('label.detail') }}</th>
                <th>{{ trans('label.author') }}</th>
                <th>{{ trans('label.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
               $count = 1;
            @endphp
            @foreach ($posts as $post)
            <tr class="text-center">
                <td>{{ $count++ }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->detail }}</td>
                <td>{{ $post->author }}</td>
                <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">{{ trans('label.edit') }}</a>
                        <button type="submit" class="btn btn-danger">{{ trans('label.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

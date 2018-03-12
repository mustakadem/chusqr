@extends('layouts.app')

@section('content')

    @foreach($usersLikes as $userLike)
        <div class="card">
            <div class="card-divider">
                <p> User  <a href="{{route('profile')}}">{{ $userLike->name }}</a></p>
            </div>
            <p >
                <img src="{{ $userLike->avatar }}" alt="">
            </p>

        </div>

    @endforeach
@endsection
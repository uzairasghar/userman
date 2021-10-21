@extends('layouts.app')

@section('content')
{{-- @if(count($user) > 0) --}}
@foreach($user as $users)
    <a href="/users/{{$users->id}}"><p>{{$users->name}} Profile</p></a>
@endforeach
    
{{-- @else

@endif --}}
@endsection
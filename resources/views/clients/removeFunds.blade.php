@extends('layouts.app')

@section('content')
<p>{{ $client->funds }}</p>
<form action="{{ route('clients.removeStoreFunds', $client)}}" method="post">
    <input type="text" name="funds">
    <input type="submit" value="Remove funds">
    @csrf
</form>

@endsection
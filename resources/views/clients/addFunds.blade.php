@extends('layouts.app')

@section('content')
<p>{{ $client->funds }}</p>
<form action="{{ route('clients.addStoreFunds', $client)}}" method="post">
    <input type="text" name="funds">
    <input class="add-funds" type="submit" value="Add funds">
    @csrf
</form>

@endsection
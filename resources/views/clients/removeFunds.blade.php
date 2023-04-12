@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Remove Funds</h1> 
                <p>{{$client->name}} {{$client->surname}}</p>
                </div>
                <div class="card-body">
                <form action="{{ route('clients.removeStoreFunds', $client)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Current amount of funds: <?= $client['funds']?></label>
                            <input type="text" class="form-control" name="funds">
                            <div class="form-text">Please enter the required amount here</div>
                        </div>
                        <input type="submit" value="Remove funds">    
                        @csrf                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <p>{{ $client->funds }}</p>
<form action="{{ route('clients.removeStoreFunds', $client)}}" method="post">
    <input type="text" name="funds">
    <input type="submit" value="Remove funds">
    @csrf
</form> --}}

@endsection
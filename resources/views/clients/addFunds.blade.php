@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                <h1>Add Funds</h1> 
                <p>{{$client->name}} {{$client->surname}}</p>
                </div>
                <div class="card-body">
                <form action="{{ route('clients.addStoreFunds', $client)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Current amount of funds: <?= $client['funds']?></label>
                            <input type="text" class="form-control" name="funds">
                            <div class="form-text">Please enter the required amount here</div>
                        </div>
                        <input type="submit" value="Add funds">    
                        @csrf                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Client</h1>
                </div>
                <div class="card-body">
                    <div class="client-line">
                        <div class="client-info">
                            {{$client->name}}
                            {{$client->surname}}
                            {{$client->personal_id}}
                            {{$client->account_no}}
                            {{$client->funds}}
                            <a href='{{ route('clients.addFunds', $client)}}'>Pridėti lėšų</a>
                            <a href='{{ route('clients.removeFunds', $client)}}'>Atimti lėšas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form>
                        <div class="form-group">
                                <label for="form-label">First name:</label><br>
                                <input class="form-control" type="text" id='name' name='name' value='{{$client->name}}'><br>
                                <label for="lname">Last name:</label><br>
                                <input class="form-control" type="text" id='surname' name='surname' value='{{$client->surname}}'><br>
                                <label for="lname">Personal ID:</label><br>
                                <input class="form-control" type="text" id='personal_id' name='personal_id'
                                    value='{{$client->personal_id}}'><br>                  
                                <label>Account number:</label><br>
                                <input class="form-control" type="text" id='account_no' name='account_no'
                                    value='{{$client->account_no}}'><br>
                                <label for="lname">The amount of existing funds:</label><br>
                                <input class="form-control" type="text" id='funds' name='funds' value='{{$client->funds}}'><br>
                        </div>
                    </form>
                    <a class="btn btn-info" href='{{ route('clients.addFunds', $client)}}'>Add funds</a>
                    <a class="btn btn-warning" href='{{ route('clients.removeFunds', $client)}}'>Subtract funds</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
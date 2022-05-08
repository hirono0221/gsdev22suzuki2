@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              
                <div class="card-header"> 
                     Appointment ({{$clients->count()}})
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">Client</th>
                          <th scope="col">Email</th>
                          <th scope="col">Skype</th>                          
                          <th scope="col">Phone</th>
                          <th scope="col">Time</th>
                          <th scope="col">Coach</th>
                          <th scope="col">Status</th>
                          <th scope="col">Prescription</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($clients as $key=>$client)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$client->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          
                          <td>
                          </td>
                          
                          <td>{{$client->user->name}}</td>
                          <td>{{$client->user->email}}</td>
                          <td>{{$client->user->skype}}</td>                          
                          <td>{{$client->user->phone_number}}</td>
                          <td>{{$client->time}}</td>
                          <td>{{$client->coach->name}}</td>
                          <td>
                            @if($client->status==1)
                             checked
                            @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
              
                            <a href="{{route('prescription.show',[$client->user_id,$client->date])}}" class="btn btn-secondary">View prescription</a>
                  

                               
                          </td>
                        </tr>
                        @empty
                        <td>There is no any appointments !</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
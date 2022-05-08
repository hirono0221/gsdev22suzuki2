@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My prescriptions</div>

                <div class="card-body">
                    
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          
                          <th scope="col">Date</th>
                          <th scope="col">Coach</th>
                          <th scope="col">Type of coaching</th>
                          <th scope="col">Coach feedback</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($prescriptions as $prescription)
                        <tr>
                         
                          <td>{{$prescription->date}}</td>
                          <td>{{$prescription->coach->name}}</td>
                          <td>{{$prescription->name_of_coaching}}</td>
                          <td>{{$prescription->feedback}}</td>
                        </tr>
                        @empty
                        <td>You have no prescriptions</td>
                        @endforelse
                       
                      </tbody>
                    </table>

                    
 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
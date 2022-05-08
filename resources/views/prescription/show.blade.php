@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
       
                    
                </div>

                <div class="card-body">
                    <p>Date:{{$prescription->date}}</p>
                    <p>Client:{{$prescription->user->name}}</p>
                    <p>Coach:{{$prescription->doctor->name}}</p>
                    <p>Coaching:{{$prescription->name_of_coaching}}</p>
                    <p>Feedback:{{$prescription->feedback}}</p>
                    <p>Coach signature:{{$prescription->signature}}</p>

                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
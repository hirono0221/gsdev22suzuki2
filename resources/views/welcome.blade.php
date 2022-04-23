@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/life.png" class="img-fluid" style="border:1px solid #ccc;">
        </div>
        <div class="col-md-6">
            <h2>Create an account & Book your Coach</h2>
            <p> iProcoach is your partner<br><br>
            Are you ready for your life to improve? Do you feel like you could be tapping into more 
            opportunities, or want to make sure you’re on the right path to live your purpose and 
            reach your dreams? iProcoach can help you address the areas in your life that 
            just aren’t working, better define your goals and help you accomplish things you may 
            have never thought possible.<br><br>
            All types of individuals turn to a certified Intuitive life coach to offer them the 
            guidance and support they need to move forward, kick excuses to the curb and start 
            living the life they’ve always wanted. Whether you want to find renewed success in 
            your business, change career paths, find your life’s purpose or simply stop feeling 
            stuck, one-on-one coaching from a certified life coach can assist you in working 
            through it. </p>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-success">Register as Client</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
        </div>
    </div>
    <hr>
<!--Search coach-->
<form action="{{url('/')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Find Coaches</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Find Coaches</button>

                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</form>

    <!--display coaches-->
    <div class="card">
        <div class="card-body">
            <div class="card-header"> Coaches </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($coaches as $coach)
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="{{asset('images')}}/{{$coach->coach->image}}" width="100px" style="border-radius: 50%;">
                            </td>
                            <td>
                                {{$coach->coach->name}}
                            </td>
                            <td>
                                {{$coach->coach->department}}
                            </td>
                            <td>
                                <a href="{{route('create.appointment',[$coach->user_id,$coach->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                            </td>
                        </tr>
                        @empty
                        <td>No coaches available today</td>
                        @endforelse


                    </tbody>
                </table>
                
            </div>
        </div>
        
    </div>
</div>
@endsection
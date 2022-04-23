@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
           

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Coaches</h5>
                    <span>appoinment time</span>
                    
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="container">
         @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
            <div class="alert bg-danger alert-success text-white" role="alert">
                {{Session::get('errmessage')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('appointment.check')}}" method="post">@csrf
 
    <div class="card">
        <div class="card-header">
            Choose date
            <br>
            
            @if(isset($date))
                Your timetable for: 
                {{$date}}
            @endif
           
        </div>
        <div class="card-body">
         <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date" >
         <br>
         <button type="submit" class="btn btn-primary">check</button>
        </div>
    </div>
  </form>
@if(Route::is('appointment.check'))
   <form action="{{route('update')}}" method="post">@csrf
    <div class="card">
        <div class="card-header">
            Choose AM time
           <span style="margin-left: 700px">Check/Uncheck
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>

        <div class="card-body">
            
            <table class="table table-striped">

             
               
              <tbody>
                <input type="hidden" name="appoinmentId" value="{{$appointmentId}}">
                <tr>
                  <th scope="row">1</th>
                  <td><input type="checkbox" name="time[]"  value="6am" @if(isset($times)){{$times->contains('time','6am')?'checked':''}}@endif>6am</td>
                  <td><input type="checkbox" name="time[]"  value="6.30am"@if(isset($times)){{$times->contains('time','6.30am')?'checked':''}}@endif>6.30am</td>
                </tr>
                 <tr>
                  <th scope="row">2</th>
                  <td><input type="checkbox" name="time[]"  value="7am"@if(isset($times)){{$times->contains('time','7am')?'checked':''}}@endif>7am</td>
                  <td><input type="checkbox" name="time[]"  value="7.30am"@if(isset($times)){{$times->contains('time','7.30am')?'checked':''}}@endif>7.30am</td>
                </tr>
                 <tr>
                  <th scope="row">3</th>
                  <td><input type="checkbox" name="time[]"  value="8am"@if(isset($times)){{$times->contains('time','8am')?'checked':''}}@endif>8am</td>
                  <td><input type="checkbox" name="time[]"  value="8.30am"@if(isset($times)){{$times->contains('time','8.30am')?'checked':''}}@endif>8.30am</td>
                </tr>

                <tr>
                  <th scope="row">4</th>
                  <td><input type="checkbox" name="time[]"  value="9am"@if(isset($times)){{$times->contains('time','9am')?'checked':''}}@endif>9am</td>
                  <td><input type="checkbox" name="time[]"  value="9.30am"@if(isset($times)){{$times->contains('time','9.30am')?'checked':''}}@endif>9.30am</td>
                </tr>

                <tr>
                  <th scope="row">5</th>
                  <td><input type="checkbox" name="time[]"  value="10am"@if(isset($times)){{$times->contains('time','10am')?'checked':''}}@endif>10am</td>
                  <td><input type="checkbox" name="time[]"  value="10.30am"@if(isset($times)){{$times->contains('time','10.30am')?'checked':''}}@endif>10.30am</td>
                </tr>

                <tr>
                  <th scope="row">6</th>
                  <td><input type="checkbox" name="time[]"  value="11am"@if(isset($times)){{$times->contains('time','11am')?'checked':''}}@endif>11am</td>
                  <td><input type="checkbox" name="time[]"  value="11.30am"@if(isset($times)){{$times->contains('time','11.30am')?'checked':''}}@endif>11.30am</td>
                </tr>
            
            
              </tbody>
            </table>
        </div>
    </div>

        <div class="card">
        <div class="card-header">
            Choose PM time
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">7</th>
                  <td><input type="checkbox" name="time[]"  value="12pm"@if(isset($times)){{$times->contains('time','12pm')?'checked':''}}@endif>12pm</td>
                  <td><input type="checkbox" name="time[]"  value="12.30pm"@if(isset($times)){{$times->contains('time','12.30pm')?'checked':''}}@endif>12.30pm</td>
                </tr>
                <tr>
                  <th scope="row">7</th>
                  <td><input type="checkbox" name="time[]"  value="1pm"@if(isset($times)){{$times->contains('time','1pm')?'checked':''}}@endif>1pm</td>
                  <td><input type="checkbox" name="time[]"  value="1.30pm"@if(isset($times)){{$times->contains('time','1.30pm')?'checked':''}}@endif>1.30pm</td>
                </tr>
                <tr>
                  <th scope="row">8</th>
                  <td><input type="checkbox" name="time[]"  value="2pm"@if(isset($times)){{$times->contains('time','2pm')?'checked':''}}@endif>2pm</td>
                  <td><input type="checkbox" name="time[]"  value="2.30pm"@if(isset($times)){{$times->contains('time','2.30pm')?'checked':''}}@endif>2.30pm</td>
                </tr>
                <tr>
                  <th scope="row">9</th>
                  <td><input type="checkbox" name="time[]"  value="3pm"@if(isset($times)){{$times->contains('time','3pm')?'checked':''}}@endif>3pm</td>
                  <td><input type="checkbox" name="time[]"  value="3.30pm"@if(isset($times)){{$times->contains('time','3.30pm')?'checked':''}}@endif>3.30pm</td>
                </tr>
                <tr>
                  <th scope="row">10</th>
                  <td><input type="checkbox" name="time[]"  value="4pm"@if(isset($times)){{$times->contains('time','4pm')?'checked':''}}@endif>4pm</td>
                  <td><input type="checkbox" name="time[]"  value="4.30pm"@if(isset($times)){{$times->contains('time','4.30pm')?'checked':''}}@endif>4.30pm</td>
                </tr>
                <tr>
                  <th scope="row">11</th>
                  <td><input type="checkbox" name="time[]"  value="5pm"@if(isset($times)){{$times->contains('time','5pm')?'checked':''}}@endif>5pm</td>
                  <td><input type="checkbox" name="time[]"  value="5.30pm"@if(isset($times)){{$times->contains('time','5.30pm')?'checked':''}}@endif>5.30pm</td>
                </tr>
                <tr>
                  <th scope="row">12</th>
                  <td><input type="checkbox" name="time[]"  value="6pm"@if(isset($times)){{$times->contains('time','6pm')?'checked':''}}@endif>6pm</td>
                  <td><input type="checkbox" name="time[]"  value="6.30pm"@if(isset($times)){{$times->contains('time','6.30pm')?'checked':''}}@endif>6.30pm</td>
                </tr>
                <tr>
                  <th scope="row">13</th>
                  <td><input type="checkbox" name="time[]"  value="7pm"@if(isset($times)){{$times->contains('time','7pm')?'checked':''}}@endif>7pm</td>
                  <td><input type="checkbox" name="time[]"  value="7.30pm"@if(isset($times)){{$times->contains('time','7.30pm')?'checked':''}}@endif>7.30pm</td>
                </tr>
                <tr>
                  <th scope="row">14</th>
                  <td><input type="checkbox" name="time[]"  value="8pm"@if(isset($times)){{$times->contains('time','8pm')?'checked':''}}@endif>8pm</td>
                  <td><input type="checkbox" name="time[]"  value="8.30pm"@if(isset($times)){{$times->contains('time','8.30pm')?'checked':''}}@endif>8.30pm</td>
                </tr>
                <tr>
                  <th scope="row">15</th>
                  <td><input type="checkbox" name="time[]"  value="9pm"@if(isset($times)){{$times->contains('time','9pm')?'checked':''}}@endif>9pm</td>
                  <td><input type="checkbox" name="time[]"  value="9.30pm"@if(isset($times)){{$times->contains('time','9.30pm')?'checked':''}}@endif>9.30pm</td>
                </tr>
                
            
            
              </tbody>
            </table>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</div>
</form>

@else 
<h3>Your appoinment time list: {{$myappointments->count()}}</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Creator</th>
              <th scope="col">Date</th>
              <th scope="col">View/Update</th>
            </tr>
          </thead>
          <tbody>

            @foreach($myappointments as $appoinment)
            <tr>
            
              <th scope="row"></th>
              <td>{{$appoinment->coach->name}}</td>
              <td>{{$appoinment->date}}</td>
              <td>
                    <form action="{{route('appointment.check')}}" method="post">@csrf
                        <input type="hidden" name="date" value="{{$appoinment->date}}">
                    <button type="submit" class="btn btn-primary">View/Update</button>


                    </form>


              </td>
            </tr>
            @endforeach
          </tbody>
        </table>



@endif



<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;

    }
    body{
        font-size: 17px;
    }
</style>



@endsection
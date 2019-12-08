@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Edit Patient
          </div>
            <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li> {{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                
                <form method="POST" action="{{route('doctorpatient.update', $user->id)}}">
                    <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{csrf_token() }}">
                  <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name',$user->first_name) }}" />
                      </div>
                      <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name',$user->last_name) }}" />
                      </div>
                      <div class="form-group">
                          <label for="address_1">Address 1</label>
                          <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1',$user->address_1) }}" />
                      <div class="form-group">
                          <label for="address_2">Address 2</label>
                          <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2',$user->address_2) }}" />
                      </div>
                      <div class="form-group">
                          <label for="phone_number">Phone Number</label>
                          <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number',$user->phone_number) }}" />
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$user->email) }}" />
                      </div>
                      <div class="form-group">
                          <label for="policy_number">Policy Number</label>
                          <input type="text" class="form-control" id="policy_number" name="policy_number" value="{{ old('policy_number',$user->patient->policy_number) }}" />                                                                
                      </div>




                   <a href ="{{route ('doctorpatient.index') }}" class="btn btn-primary">Cancel</a>
                   <button type="submit" class="btn btn-primary float-right">Submit</button>


                </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">

          <div class="card-header">
                            Edit visit
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}<li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('doctorvisit.update', $visit->id) }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="doctor">Doctor</label>
                                    <br />
                                    <select name="doctor_id">
                                        @foreach ($doctors as $doctor)
                                            <option 
                                                value={{ $doctor->id }} 
                                                {{ (old('doctor_id', $visit->doctor_id) == $doctor->id) 
                                                    ? "selected" 
                                                    : "" }}
                                            >{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patient">Patient</label>
                                    <br />
                                    <select name="patient_id">
                                        @foreach ($patients as $patient)
                                            <option 
                                                value={{ $patient->id }} 
                                                {{ (old('patient_id', $visit->patient_id) == $patient->id) 
                                                    ? "selected" 
                                                    : "" }}
                                            >{{ $patient->user->first_name }} {{ $patient->user->last_name }}</option>
                                        @endforeach
                      <div class="form-group">
                          <label for="cost">Cost</label>
                          <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost', $visit->cost)}}" />
                      <div class="form-group">
                          <label for="duration">Duration</label>
                          <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $visit->duration) }}" />
                      </div>


                   <a href ="{{route ('doctorvisit.index') }}" class="btn btn-primary">Cancel</a>
                   <button type="submit" class="btn btn-primary float-right">Submit</button>


                </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

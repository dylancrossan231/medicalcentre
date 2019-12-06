@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    Patients
                    <a href="{{ route('patient.create') }}" class="btn btn-primary float-right">Add</a>

                    </div>
                    <div class="card-body">
                    @if (count($patients)===0)
                    <p> there are no patients! </p>
                    @else
                    <table id="table-patients" class="table table-hover">
                    <thead>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Address 1</th>
                         <th>Address 2</th>
                         <th>Phone Number</th>
                         <th>Email</th>
                         <th>Policy Number</th>



                    </thead>

                    <tbody>
                        @foreach ($patients as $patient)
                            <tr data-id="{{ $patient->id }}">
                                <td>{{$patient->user->first_name}}</td>
                                <td>{{$patient->user->last_name}}</td>
                                <td>{{$patient->user->address_1}}</td>
                                <td>{{$patient->user->address_2}}</td>
                                <td>{{$patient->user->phone_number}}</td>
                                <td>{{$patient->user->email}}</td>
                                <td>{{$patient->policy_number}}</td>

                                <td>
                                <a href="{{route('patient.show', $patient->id)}}" class="btn btn-primary"> View</a>
                                <a href="{{route('patient.edit', $patient->user->id)}}" class="btn btn-warning"> Edit</a>
                                <form style="display:inline-block" method="POST" action="{{route('patient.destroy', $patient->id)}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif 
                        </div>
                     </div>
                 </div>
            </div>
         </div>
     @endsection             
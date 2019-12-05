@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    Doctors
                    <a href="{{ route('doctor.create') }}" class="btn btn-primary float-right">Add</a>

                    </div>
                    <div class="card-body">
                    @if (count($doctors)===0)
                    <p> there are no doctors! </p>
                    @else
                    <table id="table-doctors" class="table table-hover">
                    <thead>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Address 1</th>
                         <th>Address 2</th>
                         <th>Phone Number</th>
                         <th>Email</th>
                         <th>Expertise</th>
                         <th>Date Started</th>



                    </thead>

                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr data-id="{{ $doctor->id }}">
                                <td>{{$doctor->user->first_name}}</td>
                                <td>{{$doctor->user->last_name}}</td>
                                <td>{{$doctor->user->address_1}}</td>
                                <td>{{$doctor->user->address_2}}</td>
                                <td>{{$doctor->user->phone_number}}</td>
                                <td>{{$doctor->user->email}}</td>
                                <td>{{$doctor->expertise}}</td>
                                <td>{{$doctor->date_started}}</td>

                                <td>
                                <a href="{{route('doctor.show', $doctor->id)}}" class="btn btn-primary"> View</a>
                                <a href="{{route('doctor.edit', $doctor->user->id)}}" class="btn btn-warning"> Edit</a>
                                <form style="display:inline-block" method="POST" action="{{route('doctor.destroy', $doctor->id)}}">
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
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">   
                    visits
                    <a href="{{ route('visit.create') }}" class="btn btn-primary float-right">Add</a>

                    </div>
                    <div class="card-body">
                    @if (count($visits)===0)
                    <p> there are no visits! </p>
                    @else
                    <table id="table-visits" class="table table-hover">
                    <thead>
                         <th>Cost</th>
                         <th>Duration</th>
                         <th>Patient</th>
                         <th>Doctor</th>




                    </thead>

                    <tbody>
                        @foreach ($visits as $visit)
                            <tr data-id="{{ $visit->id }}">
                                <td>{{$visit->cost}}</td>
                                <td>{{$visit->duration}}</td>
                                <td><a href="{{route('doctorpatient.show', $visit->patient->id)}}"> {{$visit->patient->user->first_name}} {{$visit->patient->user->last_name}}</a></td>
                                <td><a href="{{route('doctor.show', $visit->doctor->id)}}"> {{$visit->doctor->user->first_name}} {{$visit->doctor->user->last_name}}</a></td>


                                <td>
                                <a href="{{route('doctorvisit.show', $visit->id)}}" class="btn btn-primary"> View</a>
                                <a href="{{route('doctorvisit.edit', $visit->id)}}" class="btn btn-warning"> Edit</a>
                                <form style="display:inline-block" method="POST" action="{{route('doctorvisit.destroy', $visit->id)}}">
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
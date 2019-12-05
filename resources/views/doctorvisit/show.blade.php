@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 cold-md-offset-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    Visit:
                    
                    </div>
                    <div class="card-body">

                    <table id="table-books" >
                            <td>Cost</td>
                            <tr>
                            <td>{{$visit->cost}}</td>
                            </tr>
                            <tr>
                            <td>Duration </td>
                            <td>{{$visit->duration}}</td>
                            </tr>
                            <tr>
                            <td>Doctor</td>
                            <td>
                            <a href="{{route('doctor.show', $visit->doctor->id)}}"> {{$visit->doctor->user->first_name}} {{$visit->doctor->user->last_name}}</a>
                            </td>                            
                            </tr>
                            <tr>
                            <td>Patient</td>
                            <td>
                            <a href="{{route('doctorpatient.show', $visit->patient->id)}}"> {{$visit->patient->user->first_name}} {{$visit->patient->user->last_name}}</a>
                            </td>
                            </tr>
                            
                        </tr>

                     </tbody>
                    </table>
                                    <a href="{{route('doctorvisit.index')}}" class="btn btn-primary"> Back</a>


                      
                 </div>
             </div>
         </div>
     </div>
</div>
 @endsection      
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 cold-md-offset-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    patient: {{ $patient->user->first_name }} {{ $patient->user->last_name }}
                    
                    </div>
                    <div class="card-body">

                    <table id="table-books" >
                            <td>First Name:  </td>
                            <tr>
                            <td>{{$patient->user->first_name}}</td>
                            </tr>
                            <tr>
                            <td>Last Name:  </td>
                            <td>{{$patient->user->last_name}}</td>
                            </tr>
                            <tr>
                            <td>Address 1:  </td>
                            <td>{{$patient->user->address_1}}</td>
                            </tr>
                            <tr>
                            <td>Address 2:  </td>
                            <td>{{$patient->user->address_2}}</td>
                            </tr>
                            <tr>
                            <td>Phone Number:  </td>
                            <td>{{$patient->user->phone_number}}</td>
                            </tr>
                            <tr>
                            <td>Title:  </td>
                            <td>{{$patient->user->email}}</td>
                            </tr>
                            <tr>
                            <td>Title:  </td>
                            <td>{{$patient->expertise}}</td>
                            </tr>
                            <td>Date Started</td>
                            <td>{{$patient->date_started}}
                        </tr>

                     </tbody>
                    </table>
                                    <a href="{{route('patient.index')}}" class="btn btn-primary"> Back</a>
                                    <a href="{{route('visit.index')}}" class="btn btn-primary"> Back to Visits</a>


                      
                 </div>
             </div>
         </div>
     </div>
</div>
 @endsection      
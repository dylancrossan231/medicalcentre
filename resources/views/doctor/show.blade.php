@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 cold-md-offset-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    Doctor: {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}
                    
                    </div>
                    <div class="card-body">

                    <table id="table-books" >
                            <td>First Name:  </td>
                            <tr>
                            <td>{{$doctor->user->first_name}}</td>
                            </tr>
                            <tr>
                            <td>Last Name:  </td>
                            <td>{{$doctor->user->last_name}}</td>
                            </tr>
                            <tr>
                            <td>Address 1:  </td>
                            <td>{{$doctor->user->address_1}}</td>
                            </tr>
                            <tr>
                            <td>Address 2:  </td>
                            <td>{{$doctor->user->address_2}}</td>
                            </tr>
                            <tr>
                            <td>Phone Number:  </td>
                            <td>{{$doctor->user->phone_number}}</td>
                            </tr>
                            <tr>
                            <td>Title:  </td>
                            <td>{{$doctor->user->email}}</td>
                            </tr>
                            <tr>
                            <td>Title:  </td>
                            <td>{{$doctor->expertise}}</td>
                            </tr>
                            <td>Date Started</td>
                            <td>{{$doctor->date_started}}
                        </tr>

                     </tbody>
                    </table>
                                    <a href="{{route('doctor.index')}}" class="btn btn-primary"> Back</a>
                                    <a href="{{route('visit.index')}}" class="btn btn-primary"> Back to visits</a>


                      
                 </div>
             </div>
         </div>
     </div>
</div>
 @endsection      
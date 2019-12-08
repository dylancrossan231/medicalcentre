@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctor:    {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    
                    
                    
                

                    <table id="table-books" >

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
                            <td>Email:  </td>
                            <td>{{$doctor->user->email}}</td>
                            </tr>
                            <tr>
                            <td>Expertise:  </td>
                            <td>{{$doctor->expertise}}</td>
                            </tr>
                            <td>Date Started</td>
                            <td>{{$doctor->date_started}}
                        </tr>
                    
                     </tbody>
                    </table>                      
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

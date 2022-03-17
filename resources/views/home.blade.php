@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header" style="text-align: center"><b>Kelola User</b></div>

                <div class="card-body">
                    <!--Success Message-->
                    @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <!-- Button trigger modal -->
                    <a href="{{route('createuserform')}}" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i> Create User
                    </a>            
                    <br><br>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="text-align: center">UID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($UsersData as $user)
                            <tr>
                                <td style="text-align: center">
                                    {{$user->id}}
                                </td>
                                <td><b>{{$user->name}}</b></td>
                                <td>{{$user->email}}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('updateuserform',[$user->id])}}" class="btn btn-primary btn-sm"> 
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('deleteuser',[$user->id]) }}">
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus User tersebut ?');"> <i class="fa fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kelola User</div>

                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i> Create User
                    </button>                
                    <br><br>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th>UID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($UsersData as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><b>{{$user->name}}</b></td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"> <i class="fa-solid fa-pen-to-square"></i></button>
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

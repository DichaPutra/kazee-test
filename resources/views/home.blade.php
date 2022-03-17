@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                <th>Name</th>
                                <th>E-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($UsersData as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>




                <!--<div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection

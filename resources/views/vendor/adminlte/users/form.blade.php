@extends('adminlte::page')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Registro de Usuario</div>
                        <div class="box-tools">

                        </div>
                    </div>
                    <div class="box-body">
                        @if(isset($user))
                            <form id="formCadastro" method="POST" enctype="multipart/form-data"
                                  action="{{route('users.update',$user)}}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                @else
                                    <form id="formCadastro" method="POST" enctype="multipart/form-data"
                                          action="{{route('users.store')}}">
                                        {{csrf_field()}}
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Name</label>
                                                <input class="form-control" name="name" type="text" placeholder="Name"
                                                       value="{{$user->name ?? old('name') }}">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email"
                                                       value="{{ $user->email ?? old('email')}}"
                                                       placeholder="Email address"
                                                       required>
                                            </div>
                                        </div>
                                        @if(isset($user))
                                        @else
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password"
                                                       placeholder="Password"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                       placeholder="Password" required>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-fix"><i
                                                    class="fa fa-check"></i>
                                                Salvar
                                            </button>
                                            <a href="{{route('users.index')}}" type="submit"
                                               class="btn btn-danger btn-fix"><i class="fa fa-angle-double-left"></i>
                                                Voltar
                                            </a>
                                        </div>
                                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

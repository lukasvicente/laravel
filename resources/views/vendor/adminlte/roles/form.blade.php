@extends('adminlte::page')

@section('content')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Registro de Papeis</div>
                        <div class="box-tools">

                        </div>
                    </div>
                    <div class="box-body">
                        @if(isset($user))
                            <form id="formCadastro" method="POST" enctype="multipart/form-data"
                                  action="{{route('roles.update',$user)}}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                @else
                                    <form id="formCadastro" method="POST" enctype="multipart/form-data"
                                          action="{{route('roles.store')}}">
                                        {{csrf_field()}}
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Nome</label>
                                                <input class="form-control" name="name" type="text"
                                                       placeholder="Ex.: Admin"
                                                       value="{{$role->name ?? old('name') }}">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Descrição</label>
                                                <input class="form-control" name="description" type="text"
                                                       value="{{$role->description ?? old('description') }}">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-fix"><i
                                                        class="fa fa-check"></i>
                                                Salvar
                                            </button>
                                            <a href="{{route('roles.index')}}" type="submit"
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

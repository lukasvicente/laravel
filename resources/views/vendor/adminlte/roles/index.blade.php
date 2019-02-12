@extends('adminlte::page')

@section('title', 'Assema-RN')

@section('content_header')
@section('js')
    <script>
        $(document).ready(function () {
            $('.data-table').dataTable();
        });
    </script>
@stop

@section('content')
    <a href="{{route('roles.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>
        Novo
    </a>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem de Papeis</h3>

        </div>

        <div class="box-body">
            <table class="table table-bordered table-striped data-table" id="data-table"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th style="width: 100px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $roles)
                    <tr>
                        <td>{{$roles->name}}</td>
                        <td>{{$roles->description}}</td>
                        <td>
                            <a href="{{route('roles.edit',$roles->id)}}" class=" waves-effect"
                               data-toggle="tooltip"
                               data-container="body"
                               title="Editar">
                                <span class="label label-warning"><i class="fa fa-edit"></i></span>
                            </a>
                            <a  onclick="remove(this,'{{route('roles.destroy', $roles->id )}}')" class="waves-effect"
                               data-toggle="tooltip"
                               data-container="body"
                               title="Deletar">
                                <span class="label label-danger"><i class="fa fa-trash"></i></span>
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
@endsection
@stop
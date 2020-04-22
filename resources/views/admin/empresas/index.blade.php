@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <painel titulo="Empresas Cadastradas">
                <tabela-lista  
                v-bind:titles="['Codigo','Empresa','Nome Fantasia','Fixo','Celular','CNPJ']" 
                v-bind:itens="{{$listaEmpresas}}" 
                criar="#criar" detalhe="/admin/empresas/" editar="/admin/empresas/" deletar="/admin/empresas/" token="{{ csrf_token() }}">
                </tabela-lista>
            </painel>
        </div>
    </div>
</div>

</painel>
<modal name="register" title="Cadastrar">
    <formulario id="formAdd" action="{{route('empresas.store')}}" method="post" token="{{ csrf_token() }}">

        <div class="form-group">
            <label type="text">Razão social</label>
            <input type="text" class="form-control" id="mpresa" name="empresa">
        </div>
        <div class="form-group">
            <label type="text">Nome fantasia</label>
            <input type="text" class="form-control" id="fantasia" name="fantasia">
        </div>
        <div class="form-group">
            <label type="text">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Fone fixo</label>
                <input type="text" class="form-control" id="fixo" name="fixo">
            </div>
            <div class="form-group col-md-6">
                <label type="text">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular">
            </div>
        </div>
    </formulario>
    <span slot="button">
        <button form="formAdd" type="submit" class="btn btn-light">Cadastrar</button>
    </span>
</modal>

<modal name="editar" title="Editar">
    <formulario id="formEdit" v-bind:action="'/admin/empresas/' + $store.state.item.id" method="put" token="{{ csrf_token() }}">
        <div class="form-group">
            <label type="text">Razão social</label>
            <input type="text" class="form-control" id="empresa" name="empresa" v-model="$store.state.item.empresa">
        </div>
        <div class="form-group">
            <label type="text">Nome fantasia</label>
            <input type="text" class="form-control" id="fantasia" name="fantasia" v-model="$store.state.item.fantasia">
        </div>
        <div class="form-group col-md-6">
                <label>CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" v-model="$store.state.item.cnpj">
            </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Fone fixo</label>
                <input type="text" class="form-control" id="fixo" name="fixo" v-model="$store.state.item.fixo">
            </div>
            <div class="form-group col-md-6">
                <label type="text">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" v-model="$store.state.item.celular">
            </div>
        </div>
    </formulario>
    <span slot="button">
        <button form="formEdit" type="submit" class="btn btn-light">Salvar</button>
    </span>
</modal>
<modal name="detalhe" title="Detalhe">
    <painel v-bind:titulo="$store.state.item.empresa">

        <div>
            <label type="text">Criado Em</label>
            <p>@{{$store.state.item.created_at}}</p>
        </div>

        <div>
            <label type="text">Alterado Em</label>
            <p>@{{$store.state.item.updated_at}}</p>
        </div>

    </painel>
</modal>
@endsection
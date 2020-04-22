@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <painel titulo="Painel De Controle">

                <div class="row">
                    <div class="col-md-4">
                        <caixa desc=" Cadastre um cliente Juridico" titulo="Juridico" url="{{route('empresas.index')}}" color="#00c0ef" icon="ion-briefcase" button="Consultar"></caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa desc="Cadastre Produto" titulo="Fisico" url="#" color="#32CD32" icon="ion-android-cart" button="Criar"></caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa desc="Crie uma nova cotação" titulo="Orçamentos" url="#" color="#DAA520" icon="ion-bag" button="Cadastrar"></caixa>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
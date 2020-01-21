@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>


            <tabela-lista
                    v-bind:titulos="['#','Título','Descrição']"
                    v-bind:itens="{{$listaArtigos}}"
                    ordem="asc" ordemcol="1"
                    criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="7887522323"
                    modal="sim"

            ></tabela-lista>


        </painel>
    </pagina>
    <modal nome="adicionar">
        <painel titulo="Adicionar">
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao">
                </div>
                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>
    <modal nome="editar">
        <painel titulo="Editar">
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descricao">
                </div>
                <button class="btn btn-info">Editar</button>
            </formulario>
        </painel>
    </modal>

@endsection

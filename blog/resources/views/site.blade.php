@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">

            <div class="row">
                @foreach($lista as $key => $value)

                  <artigocard
                  titulo="{{$value->titulo}}"
                  descricao="{{$value->descricao}}"
                  link="#"
                  imagem="https://coletiva.net/files/e4da3b7fbbce2345d7772b0674a318d5/midia_foto/20170713/118815-maior_artigo_jul17.jpg"
                  data="{{$value->data}}"
                  autor="{{$value->autor}}"
                  sm="6"
                  md="4">

                  </artigocard>

                @endforeach
            </div>

            <div align="center">
                {{$lista}}
            </div>


        </painel>
    </pagina>
@endsection

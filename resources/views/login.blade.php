@extends('layouts/login_layout') {{--nome da pasta/nome do arquivo--}}

@section('conteudo') {{--o mesmo nome do yield--}}
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-4 offset-sm-4">
                {{--formulario--}}
                <form action="{{route('login_submit')}}" method="post">
                    @csrf
                    <h4>Login </h4>
                    <hr>
                    <div class="form-group">
                        <label>Usuário</label>
                        <input type="email" name="text_usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="text_senha" class="form-control">
                    </div>
                    {{--botao para entrar--}}
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </div>
                </form>

                {{--perguntar se tem algum erro ERRO DE VALIDAÇÂO--}}
                @if($errors->any()) {{--se existe algum erro--}}
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $mensagem)
                                <li>
                                    {{$mensagem}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--ERRO De login/esta mensagem so vai aparecer se uma variavel erro estiver dentro na view--}}
                @if (isset($erro))
                    <div class="alert alert-danger text-center">{{$erro}}</div>
                @endif

            </div>
        </div>
    </div>
@endsection

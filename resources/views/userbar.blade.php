<div class="container-fluid bg-dark text-white">
    <div class="row">
        <div class="col-6 p-3">[APLICAÇÃO]</div>
        <div class="col-6 text-right p-3">
            {{session('usuario')['usuario']}}|<a href="{{route('logout')}}" class="btn btn-primary">Sair</a>
        </div>
    </div>
</div>
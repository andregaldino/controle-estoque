<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav nav-justified">
                <li><a href="/" class="navbar-brand">Painel Administrativo</a></li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li id="center-xs" {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="#" class="hvr-sweep-to-right tile1">New</a></li>
                <li id="center-xs" ><a href="{{ route('categorias.index') }}" class="hvr-sweep-to-right tile2">Categoria</a></li>
                <li id="center-xs" ><a href="{{ route('treinamentos.index') }}" class="hvr-sweep-to-right tile3">Treinamento</a></li>

                <li id="center-xs" ><a href="{{ route('exames.index') }}" class="hvr-sweep-to-right tile3">Exames</a></li>
                <li id="center-xs" ><a href="{{ route('cargos.index') }}" class="hvr-sweep-to-right tile3">Cargos</a></li>
                <li id="center-xs" ><a href="{{ route('empresas.index') }}" class="hvr-sweep-to-right tile3">Empresas</a></li>
                <li id="center-xs" ><a href="{{ route('funcionarios.index') }}" class="hvr-sweep-to-right tile3">Funcionarios</a></li>

                <li id="center-xs" ><a href="{{ route('epis.index') }}" class="hvr-sweep-to-right tile3">EPI</a></li>
                <li class="visible-xs"><a href="#" class="hvr-sweep-to-right instagram"><i class="fa fa-instagram fa-lg"></i></a></li>
                <li class="visible-xs"><a href="#" class="hvr-sweep-to-right twitter"><i class="fa fa-twitter fa-lg"></i></a></li>
                <li class="visible-xs"><a href="#" class="hvr-sweep-to-right facebook"><i class="fa fa-facebook fa-lg"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right icon-list hidden-xs">
                <li><a href="#" class="hvr-sweep-to-right instagram"><i class="fa fa-instagram fa-lg"></i></a></li>
                <li><a href="#" class="hvr-sweep-to-right twitter"><i class="fa fa-twitter fa-lg"></i></a></li>
                <li><a href="#" class="hvr-sweep-to-right facebook"><i class="fa fa-facebook fa-lg"></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
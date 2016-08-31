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
                <a href="{{ route('dashboard') }}" class="navbar-brand">Painel Administrativo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li  ><a href="{{ route('categorias.index') }}" class="hvr-sweep-to-right tile2">Categorias</a></li>
                    <li  ><a href="{{ route('epis.index') }}" class="hvr-sweep-to-right tile3">EPIs</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresa <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li  ><a href="{{ route('cargos.index') }}" class="hvr-sweep-to-right tile3">Cargos</a></li>
                    <li  ><a href="{{ route('empresas.index') }}" class="hvr-sweep-to-right tile3">Empresas</a></li>
                    <li  ><a href="{{ route('exames.index') }}" class="hvr-sweep-to-right tile3">Exames</a></li>
                    <li  ><a href="{{ route('funcionarios.index') }}" class="hvr-sweep-to-right tile3">Funcionarios</a></li>
                    <li  ><a href="{{ route('treinamentos.index') }}" class="hvr-sweep-to-right tile3">Treinamentos</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Historico <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li  ><a href="{{ route('entradas.index') }}" class="hvr-sweep-to-right tile3">Entrada</a></li>
                    <li  ><a href="{{ route('saidas.index') }}" class="hvr-sweep-to-right tile3">Saidas</a></li>
                    <li  ><a href="{{ route('saidas.search') }}" class="hvr-sweep-to-right tile3">Relatorios</a></li>
                  </ul>
                </li>
                
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">{{Sentinel::getUser()->first_name . " " . Sentinel::getUser()->last_name }}  </p></li>
                <li><a href="{{ route('logout') }}" >Sair</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
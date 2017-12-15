<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">Finaças</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @guest
            @else
            <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-piggy-bank"></span> Gerenciar <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('mes.create')}}"><span class="glyphicon glyphicon-plus"></span>&nbsp; Adicionar mês</a></li>
                        <li><a href="{{route('gerenciarMes')}}"><span class="glyphicon glyphicon-cog"></span>&nbsp; Gerenciar mês</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('contas.create')}}"><span class="glyphicon glyphicon-plus"></span>&nbsp; Adicionar Conta</a></li>
                    </ul>
                </li>
            </ul>
            @endGuest
            <!-- form de pesquisa-->
            @guest
            @else
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            @endguest
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('register')}}">Register</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
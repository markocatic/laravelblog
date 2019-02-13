<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="{{route('index')}}"><h1>BUSINESS BLOG</h1></a>
            </div>
            <div class="search">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="social">
                <ul>
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="facebook twitter"> </a></li>
                    <li><a href="#" class="facebook chrome"> </a></li>
                    <li><a href="#" class="facebook in"> </a></li>
                    <li><a href="#" class="facebook beh"> </a></li>
                    <li><a href="#" class="facebook vem"> </a></li>
                    <li><a href="#" class="facebook yout"> </a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!--head-bottom-->
    <div class="head-bottom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @foreach($nav as $n)
                        <li><a href="{{ url($n->route) }}">{{ $n->name }}</a></li>
                    @endforeach
                    @if(session()->has('user'))
                        @if(session()->get('user')->role == 'admin')
                            <li><a href="{{ route('users.index') }}"> Admin Panel</a></li>
                        @endif
                        <li><a href="{{ route("logout") }}">Logout</a></li>
                        @else
                        <li><a href="{{ route('loginForm') }}">Login</a></li>
                        <li><a href="{{ route('registerForm') }}">Registration</a></li>
                    @endif

                </ul>
            </div><!--/.nav-collapse -->
        </div>

    </div>
    <!--head-bottom-->
</div>	
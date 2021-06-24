<div class="sidebar" data-color="orange" data-background-color="white" >
    <div class="logo"><a href="/" class="simple-text logo-normal">
        logo
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{ url('/')}}">
            <i class="material-icons">dashboard</i>
            <p>Accueil</p>
          </a>
        </li>
        <li class="nav-item @if (request()->route()->uri=='categories')
            active
             @endif">
          <a class="nav-link" href="{{ route('categories.index')}}">
            <i class="material-icons">category</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item @if (request()->route()->uri=='articles')
            active
             @endif">
          <a class="nav-link" href="{{route('articles.index')}}">
            <i class="material-icons">list</i>
            <p>articles</p>
          </a>
        </li>
        <li class="nav-item @if (request()->route()->uri=='charges')
            active
             @endif">
          <a class="nav-link" href="{{route('charges.index')}}">
            <i class="material-icons">list</i>
            <p>charges</p>
          </a>
        </li>

        <li class="nav-item  @if (request()->route()->uri=='realisations')
            active
             @endif">
          <a class="nav-link" href="{{ route('commends.index')}}">
            <i class="material-icons">content_paste</i>
            <p>commends</p>
          </a>
        </li>
        <li class="nav-item @if (request()->route()->uri=='users')
            active
             @endif">
          <a class="nav-link" href="{{ route('users.index')}}">
            <i class="material-icons">account_circle</i>
            <p>users</p>
          </a>
        </li>
        {{-- <li class="nav-item @if (request()->route()->uri=='ventes')
            active
             @endif">
          <a class="nav-link" href="{{ route('ventes.index')}}">
            <i class="material-icons">account_circle</i>
            <p>ventes</p>
          </a>
        </li> --}}


      </ul>
    </div>
  </div>

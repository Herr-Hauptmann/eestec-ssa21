<nav class="navbar fixed-top navbar-expand-lg navbar-dark pt-0 pb-0 pr-4" style="background-color: #54049A;">
  <a class="navbar-brand" href="#">
    <img src="/img/logo1.png" width="50%" height="50%" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#o_ssa">SSA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#o_organizaciji">EESTEC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#novosti">Novosti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#treninzi">Treninzi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#treneri">Treneri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#partneri">Partneri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#mediji">Mediji</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#organizatori">Organizatori</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Edicije
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($edicije as $edicija)
          <li><a class="dropdown-item" href="#">{{ $edicija->naziv }}</a></li>
          @endforeach
        </ul>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#drugi-o-nama">Drugi o nama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#kontakt">Kontakt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('prijava') }}">Prijava</a>
      </li>
    </ul>
  </div>
</nav>


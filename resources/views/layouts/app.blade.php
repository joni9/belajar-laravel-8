<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>
    {{-- cdn bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- cdn icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- style css style --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- animasi aos --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- end animasi aos --}}
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark"  style="background:#3ee728;">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  {{ Request::is('profil*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profil/ti">TI</a></li>
              <li><a class="dropdown-item" href="/profil/himatek">HIMATEK</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/profil/dosen">Dosen</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" aria-current="page" href="/posts">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="/category">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kemahasiswaan') ? 'active' : '' }}" aria-current="page" href="/kemahasiswaan">Kemahasiswaan</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Wellcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log out</a></button>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>  
        @endauth
      </ul> 
      </div>
    </div>
  </nav>
  <body style="background-color: rgb(205, 209, 209)">
    @yield('content')
    <footer class="mt-5">
      <nav class="navbar navbar-expand-lg navbar-dark justify-content-center"  style="background:#3ee728; color:white">
        <h6>By Joni Evendi</h6>
      </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    {{-- js animasi aos  --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 250, // offset (in px) from the original trigger point
        once: true, // whether animation should happen only once - while scrolling down
      });
    </script>
    {{-- end animasi aos --}}
    {{-- js animasi gsab --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js"></script>
    <script>
      gsap.from(".kotak1", {opacity: 0, y: 100, duration: 1});
      gsap.to(".kategori1", {duration: 2, text: "Halaman Kategori", ease: "none"});
    </script>
    {{-- end animasi gsab --}}
  </body>
</html>
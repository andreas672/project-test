<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <div>
      <a class="navbar-brand text-white " href="/">
        <h1>Memo Online</h1>
      </a>
    </div>
    <div>
      
      @if (Route::has('login'))
<nav class="-mx-3 flex flex-1 justify-end">
    @auth
    <a href="{{ url('/dashboard') }}" class="btn text-white rounded-md px-3 py-2">
        Dashboard
    </a>
    @else
    <a href="{{ route('login') }}" class="btn  text-white rounded-md px-3 py-2">
        Log in
    </a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="btn text-white rounded-md px-3 py-2">
        Register
    </a>
    @endif
    @endauth
</nav>
@endif

    </div>
  </div>
</nav>
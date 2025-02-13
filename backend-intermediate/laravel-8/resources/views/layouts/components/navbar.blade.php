<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/tasks" class="nav-link px-2 text-white">Home</a></li>
            </ul>
            @guest
                <div class="text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" type="button" class="btn btn-warning">Sign-up</a>
                </div>
            @else
                <button type="button"
                    onclick="
                    event.preventDefault();
                    document.getElementById('form-logout').submit()"
                    class="btn btn-warning">
                    {{ Auth::user()->name }}
                </button>

                <form action="{{ route('logout') }}" method="post" id="form-logout">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</header>

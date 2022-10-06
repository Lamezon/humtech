<header class="p-3 bg-dark text-white menubar">
  <div class="container">
    <div class="flex-wrap justify-content-lg-start">
      @auth
      <div class="row">
          <div class="col-sm-12 logged-as">
            <h3>Conectado como: {{auth()->user()->name}}</h3>
          </div>
        </div>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <div class="row">
            <a href="/sellers-list" class="nav-link px-6 col-sm-3 col-xs-12 text-white btn btn-outline-secondary">Vendedores</a>
            <a href="/products-list" class="nav-link px-6 col-sm-3 col-xs-12 text-white btn btn-outline-secondary">Produtos</a>
            <a href="/sales-list" class="nav-link px-6 col-sm-3 col-xs-12 text-white btn btn-outline-secondary">Vendas</a>
            <a href="/reports" class="nav-link px-6 col-sm-3 col-xs-12 text-white btn btn-outline-secondary">Relatórios</a>
          </div>
        </ul>
        <div class="text-end">
          <form method="POST" action="{{ route('logout') }}">
          @csrf
            <button class="btn btn-danger" :href="route('logout')"
                onclick="event.preventDefault();
                              this.closest('form').submit();">
              {{ __('Log Out') }}
            </button>
          </form>
        </div>

      @endauth
    </div>
  </div>
</header>
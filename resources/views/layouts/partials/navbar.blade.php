<header class="p-3 bg-dark text-white menubar">
  <div class="container">
    <div class="flex-wrap justify-content-lg-start">
      @auth
      <div class="text-end">
        
      
          <a href="/report-logout"><button class="btn btn-danger">Sair
          </button></a>
        </form>
      </div>
      <div class="row">
          <div class="col-sm-12 logged-as">
            <?php $statusCaixa = Session::get('caixa'); ?>
            <h3>Conectado como: {{auth()->user()->name}} <br> Caixa: 
            <?php if($statusCaixa==true){
              ?> Aberto <?php } else{ ?> Fechado <?php } ?></h3>
          </div>
        </div>
     
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <div class="row">


          <?php if($statusCaixa==false){ ?>
            <a href="/status-caixa" class="nav-link px-6 col-sm-12 col-xs-12 text-white btn btn-outline-secondary btn-danger">Caixa</a>
          
            <a class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary disabled">Vendas</a> 
            <a href="/clients-list" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Clientes</a>
            <a href="/sangria" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn disabled btn-outline-secondary">Sangria</a>
            <a href="/suprimento" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn disabled btn-outline-secondary">Suprimentos</a>
          <?php } ?>
          <?php if($statusCaixa==true){ ?> 
            <a href="/status-caixa" class="nav-link px-6 col-sm-12 col-xs-12 text-white btn btn-outline-secondary btn-success">Caixa</a>
          
            <a href="/sales-list" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Vendas</a>
            <a href="/clients-list" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Clientes</a>
            <a href="/sangria" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Sangria</a>
            <a href="/suprimento" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Suprimentos</a>
          <?php } ?>
          
    
          <?php if((auth()->user()->name)=="Admin"){ ?>
            <a href="/products-list" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Produtos</a>
            <a href="/earn-list" class="nav-link px-6 col-sm-6 col-xs-12 text-white btn btn-outline-secondary">Alteração de Caixa (Administrativo)</a>
            <a href="/list-report" class="nav-link px-6 col-sm-12 col-xs-12 text-white btn btn-outline-secondary">Relatorios</a>
          <?php } ?>
        </div>
      </ul>
      @endauth
    </div>
  </div>
</header>
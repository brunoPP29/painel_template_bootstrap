<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="./estilo/style.css" rel="stylesheet" type="text/css"> 

</head>
  <body>
    <div class="nav-bar1">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Painel BOOTSTRAP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Equipe
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?php echo INCLUDE_PATH; ?>cadastrar-equipe.php">Cadastrar Equipe</a></li>
    <li><a class="dropdown-item" href="/exemplo.php">Exemplo</a></li>
    <li><a class="dropdown-item" href="/exemplo.php">Teste</a></li>
  </ul>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Exemplo 1
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Exemplo</a></li>
    <li><a class="dropdown-item" href="#">Exemplo</a></li>
    <li><a class="dropdown-item" href="#">Teste</a></li>
  </ul>
</div>
      </ul>
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Menu OUTSCREEN</button>
    </div>
  </div>
  </div>
</nav>
    </div>



<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">PAINEL DO SITE</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Aqui Vai as funções ou lugar praa aprender etc</p>
    <div class="container mt-5">
    <h2>Serviços</h2>

    <div class="d-flex align-items-start">
      <div class="nav flex-column nav-pills me-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Opção 1</button>
      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Opção 2</button>
      <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Opção 3</button>
      <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Opção 4</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
        <h3>Opção 1</h3>  
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas veritatis aut nemo a natus amet reiciendis, illum perferendis soluta corrupti quidem. Molestiae eius possimus modi, consequuntur inventore dignissimos. Ab, debitis.</div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <h3>Opção 2</h3>  
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio vel officia minus quas quo minima nam autem fugiat nostrum, dolorum optio quae, sed recusandae corrupti quia doloribus iusto inventore soluta.</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
      <h3>Opção 3</h3>  
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sit dolore consectetur nisi veniam ratione eius enim accusantium nesciunt nam doloribus esse, perferendis hic a deserunt, quasi officiis repudiandae natus.</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
      <h3>Opção 4</h3>  
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta magnam nemo tenetur laboriosam perspiciatis rem minima ratione! Commodi quaerat dolorum at maiores magnam veritatis optio, nisi a perspiciatis id molestiae?</div>
    </div>
  </div>
</div>
</div>
  </div>
</div><!-- offcanvas -->

<aside class="bg-light p-4 border rounded shadow-sm">
  <h6 class="text-muted">Resumo do Sistema</h6>
  <div class="mb-3">
    <strong>Usuários ativos:</strong> 124
  </div>
  <div class="mb-3">
    <strong>Usuários totais:</strong> 200
  </div>
  <div class="mb-3">
    <strong>Usuários no painel:</strong> 2
  </div>
  <div class="mb-3">
    <strong>Usuários logados:</strong> 20
  </div>
  <button class="btn btn-outline-danger w-100">🚪 Logout</button>
</aside>

<?php

Painel::carregarPagina();

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>
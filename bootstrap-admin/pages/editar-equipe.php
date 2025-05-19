<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Editar Funcionário</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="João da Silva" required>
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" value="Desenvolvedor Júnior" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" value="joao@email.com" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Imagem Atual</label><br>
          <img src="uploadsEqui/exemplo.png" alt="Imagem atual" class="img-thumbnail" style="max-width: 100px;">
        </div>

        <div class="mb-3">
          <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
          <input type="file" class="form-control" id="imagem" name="imagem">
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar Funcionário</button>
      </form>
    </div>
  </div>
</div>
<?php


?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Cadastro de Equipe</h4>
    </div>
    <div class="card-body">
      <form>
        <div class="mb-3">
          <label for="teamName" class="form-label">Nome Funcionário</label>
          <input type="text" class="form-control" id="teamName" placeholder="Digite o nome do funcionário" required>
        </div>

        <div class="mb-3">
          <label for="members" class="form-label">Cargo</label>
          <textarea class="form-control" id="members" rows="3" placeholder="Ex: Desenvolvedor Júnior, Sênior..." required></textarea>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail de Contato</label>
          <input type="email" class="form-control" id="email" placeholder="equipe@email.com" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Imagem do Funcionário</label>
          <input type="file" class="form-control" id="imagem-func" required>
        </div>


        <button type="submit" class="btn btn-success w-100">Cadastrar Equipe</button>
      </form>
    </div>
  </div>
</div>
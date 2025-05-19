<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0">Lista de Funcionários</h4>
    </div>
    <div class="card-body">
      
      <!-- Funcionário 1 -->
      <div class="d-flex justify-content-between align-items-center border p-3 mb-3 rounded">
        <div>
          <h5 class="mb-1">João Silva</h5>
          <p class="mb-0 text-muted">Desenvolvedor Júnior | joao@email.com</p>
        </div>
        <div>
          <button class="btn btn-sm btn-warning me-2" onclick="editarFuncionario(this)">Editar</button>
          <button class="btn btn-sm btn-danger" onclick="deletarFuncionario(this)">Deletar</button>
        </div>
      </div>

      <!-- Funcionário 2 -->
      <div class="d-flex justify-content-between align-items-center border p-3 mb-3 rounded">
        <div>
          <h5 class="mb-1">Maria Oliveira</h5>
          <p class="mb-0 text-muted">Designer Sênior | maria@email.com</p>
        </div>
        <div>
          <button class="btn btn-sm btn-warning me-2" onclick="editarFuncionario(this)">Editar</button>
          <button class="btn btn-sm btn-danger" onclick="deletarFuncionario(this)">Deletar</button>
        </div>
      </div>

    </div>
  </div>
</div>
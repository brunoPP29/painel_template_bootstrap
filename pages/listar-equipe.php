<div class="container mt-5">
  <div class="card shadow rounded">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-people me-2"></i>Lista de Funcionários</h4>
    </div>
    <div class="card-body">

      <!-- Formulário de Pesquisa -->
       <h4 class="text-center">Busque um Funcionário</h4>
      <form class="d-flex justify-content-center mb-4" method="post">
        <div class="input-group w-75 w-md-50">
          <span class="input-group-text bg-white"><i class="bi bi-search"></i>
</span>
          <input type="text" class="form-control" name="q" placeholder="Digite sua pesquisa..." required>
          <button name="acao" class="btn btn-light" type="submit">
  <i class="bi bi-arrow-right-circle text-dark fs-5"></i>
</button>

    <?php
    $query = "";
      if (isset($_POST['acao'])) {
        echo '<div style="margin-top: 15px;" class="w-100 text-center mb-3">';
        echo '<div class="alert alert-info shadow-sm rounded d-inline-block px-4 py-2">';
        echo '<i class="bi bi-info-circle me-2"></i>Mostrando resultados para: <strong>' . htmlspecialchars($_POST['q']) . '</strong>';
        echo '</div>';
        echo '</div>';
        $busca = $_POST['q'];
        $query = "WHERE nome LIKE '%$busca%' OR cargo LIKE '%$busca%' OR email LIKE '%$busca%'";
      }
    
    
    ?>
        </div>
      </form>

      <?php
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe` $query");
      $sql->execute();
      $funcionarios = $sql->fetchAll();
      foreach ($funcionarios as $key => $value) {
        $id = $value['id'];
      ?>

        <!-- Cartão de Funcionário -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center border p-3 mb-3 rounded">
          <div class="d-flex align-items-center">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploadsEqui/<?php echo $value['img'] ?>" alt="Imagem do Funcionário" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
            <div>
              <h5 class="mb-1"><?php echo $value['nome'] ?></h5>
              <p class="mb-0 text-muted">
                <i class="bi bi-briefcase me-1"></i><?php echo $value['cargo'] ?> |
                <i class="bi bi-envelope me-1"></i><?php echo $value['email'] ?>
              </p>
            </div>
          </div>
          <form method="post" class="mt-3 mt-md-0">
            <input type="hidden" name="idDeletar" value="<?php echo $id; ?>">
            <button name="editar" type="submit" class="btn btn-sm btn-warning me-2">
              <i class="bi bi-pencil me-1"></i>Editar
            </button>
            <button type="submit" name="acaoDeletar" class="btn btn-sm btn-danger">
              <i class="bi bi-trash me-1"></i>Deletar
            </button>
          </form>
        </div>

      <?php } ?>

      <!-- Confirmação de Deleção -->
      <?php
      if (isset($_POST['editar'])) {
        $idEditar = $_POST['idDeletar'];
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'editar-equipe?id=' . $idEditar . '";</script>';
      }

      if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
        echo '<div class="alert alert-warning" role="alert">
          <p><i class="bi bi-exclamation-triangle me-2"></i>Tem certeza que deseja deletar este funcionário?</p>
          <form method="post" class="d-flex justify-content-between mt-3">
            <input type="hidden" name="idDeletar" value="' . $_POST['idDeletar'] . '">
            <button type="submit" name="confirmarDeletar" class="btn btn-danger"><i class="bi bi-check me-1"></i>Sim</button>
            <button type="submit" name="cancelarDeletar" class="btn btn-secondary"><i class="bi bi-x me-1"></i>Não</button>
          </form>
        </div>';
      }

      if (isset($_POST['cancelarDeletar'])) {
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'listar-equipe";</script>';
        exit;
      }

      if (isset($_POST['confirmarDeletar'])) {
        $idDeletar = $_POST['idDeletar'];

        $sqlImg = MySql::conectar()->prepare("SELECT img FROM `tb_admin.equipe` WHERE id = ?");
        $sqlImg->execute(array($idDeletar));
        $img = $sqlImg->fetch()['img'];
        unlink('uploadsEqui/' . $img);

        $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.equipe` WHERE id = ?");
        $sql->execute(array($idDeletar));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Funcionário deletado com sucesso!');
        } else {
          Painel::alertErro('Erro ao deletar funcionário!');
        }
        echo '<script>window.location.href="' . INCLUDE_PATH_PAINEL . 'listar-equipe";</script>';
        exit;
      }
      ?>

    </div>
  </div>
</div>

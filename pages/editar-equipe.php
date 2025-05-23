
<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Funcionário</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <?php


      $idRecebido = $_GET['id'];
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe` WHERE id = ?");
      $sql->execute(array($idRecebido));
      $funcionario = $sql->fetchAll();

      foreach ($funcionario as $key => $value) {
        # code...
      if (!$funcionario) {
        echo '<div class="alert alert-danger">Funcionário não encontrado!</div>';
        exit;
      }else {
        echo '<div class="mb-3">
            <label for="cargo" class="form-label">Quem você quer editar?</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-check"></i></span>
              <select class="form-select" id="quem" name="quem" required>
              <option value="'.$idRecebido.'">'.$value['nome'].'</option>
              </select>
            </div>
        </div>';
      }
    }


    if (isset($_POST['acao'])) {
      $nome = $_POST['nome'] ?? $funcionario[0]['nome'];
      $cargo = $_POST['cargo'] ?? $funcionario[0]['cargo'];
      $email = $_POST['email'] ?? $funcionario[0]['email'];

      if (!empty($_FILES['imagem']['name'])) {
        $imagem = $_FILES['imagem'];
        $imagem = Painel::uploadFileEquipe($imagem);

        if (file_exists('uploadsEqui/' . $funcionario[0]['img'])) {
          unlink('uploadsEqui/' . $funcionario[0]['img']);
        }

        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.equipe` SET nome = ?, cargo = ?, email = ?, img = ? WHERE id = ?");
        $sql->execute(array($nome, $cargo, $email, $imagem, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Funcionário atualizado com sucesso!');
          echo '<div class="alert alert-warning">
          <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página de edição de funcionário em alguns segundos.
        </div>';
          ob_flush();
          flush();
          sleep(3);
          echo '<script>window.location.href = "'.INCLUDE_PATH.'editar-equipeAny";</script>';
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }
      } else {
        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.equipe` SET nome = ?, cargo = ?, email = ? WHERE id = ?");
        $sql->execute(array($nome, $cargo, $email, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Funcionário atualizado com sucesso!');
          echo '<div class="alert alert-warning">
          <i class="bi bi-clock-history me-2"></i>Você será redirecionado para a página de edição de funcionário em alguns segundos.
        </div>';
          ob_flush();
          flush();
          sleep(3);
          echo '<script>window.location.href = "'.INCLUDE_PATH.'editar-equipeAny";</script>';
        } else {
          Painel::alertErro('Erro ao atualizar funcionário!');
        }

    }
  }
      
      
      
      ?>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $value['nome']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
            <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $value['cargo']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $value['email']; ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Imagem Atual</label><br>
          <img src="uploadsEqui/<?php echo $value['img']; ?>" alt="Imagem atual" class="img-thumbnail" style="max-width: 100px;">
        </div>

        <div class="mb-3">
          <label for="imagem" class="form-label">Nova Imagem (opcional)</label>
          <input type="file" class="form-control" id="imagem" name="imagem">
        </div>

        <button style="color: black !important; border: 1px solid black !important;" name="acao" type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-2"></i>Atualizar Login</button>
      </form>
    </div>
  </div>
</div>

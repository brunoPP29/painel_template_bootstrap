<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Editar Funcionário</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
          <label for="cargo" class="form-label">Quem você deseja editar?</label>
          <select class="form-select" id="quem" name="quem" required>
      <?php


        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe`");
        $sql->execute();
        $funcionario = $sql->fetchAll();

      foreach ($funcionario as $key => $value) {
           echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>';
        }
        ?>
        </select>
        </div>
<?php

      if (isset($_POST['acao'])) {
        $quem = $_POST['quem'];
        echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'editar-equipe?id='.$quem.'";</script>';
      }
      
      
      ?>

        <button name="acao" type="submit" class="btn btn-primary w-100">Atualizar Funcionário</button>
      </form>
    </div>
  </div>
</div>
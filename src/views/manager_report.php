<main class="content">
  <?php
  renderTitle(
    'Manager Report',
    '',
    'icofont-chart-histogram'
  );
  ?>

  <div class="summary-boxes">
    <div class="summary-box bg-primary">
      <i class="icon icofont-users"></i>
      <p class="title">Quantidade de funcionários</p>
      <h3 class="value"><?= $activeUsersCount; ?></h3>
    </div>
    <div class="summary-box bg-danger">
      <i class="icon icofont-patient-bed"></i>
      <p class="title">Faltas</p>
      <h3 class="value"><?= count($absentUsers); ?></h3>
    </div>
    <div class="summary-box bg-primary">
      <i class="icon icofont-sand-clock"></i>
      <p class="title">Horas no Mês</p>
      <h3 class="value"><?= $hoursInMonth; ?></h3>
    </div>
  </div>

  <?php if (count($absentUsers) > 0): ?>
  <div class="card mt-4">
    <div class="card-header">
      <h4 class="card-title">Faltosos do Dia</h4>
      <p class="card-category mb-0">Relação dos funcionários que não bateram ponto</p>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <th>Name</th>
        </thead>
        <tbody>
          <?php foreach($absentUsers as $name): ?>
            <tr>
              <td><?= $name ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php endif; ?>
</main>
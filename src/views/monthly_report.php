<main class="content">
  <?php
    renderTitle(
      'Monthly Report',
      'Follow up your time balance',
      'icofont-ui-calendar'
    );
  ?>
  <div>
    <form class="mb-4" action="#" method="post">
      <div class="input-group">
        <?php if($user->is_admin) :?>
          <select name="user" class="form-control mr-2" placeholder="User Select">
            <?php
              foreach($users as $user) {
                $selected = $user->id === $selectedUserId ? 'selected' : '';
                echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
              }
            ?>
            </select>
            <?php endif ?>
        <select name="period" class="form-control" placeholder="Period Select">
          <?php
            foreach($periods as $key => $month) {
              $selected = $key === $selectedPeriod ? 'selected' : '';
              echo "<option value='{$key}' {$selected}>{$month}</option>";
            }
          ?>
        </select>
        <button class="btn btn-primary ml-2">
          <i class="icofont-search"></i>
        </button>
      </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <th>Day</th>
        <th>Entry 1</th>
        <th>Exit 1</th>
        <th>Entry 2</th>
        <th>Exit 2</th>
        <th>Balance</th>
      </thead>
      <tbody>
        <?php foreach($report as $registry): ?>
          <tr>
            <td><?= formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y') ?></td>
            <td><?= $registry->time1 ?></td>
            <td><?= $registry->time2 ?></td>
            <td><?= $registry->time3 ?></td>
            <td><?= $registry->time4 ?></td>
            <td><?= $registry->getBalance() ?></td>
          </tr>
          <?php endforeach ?>
          <tr class="bg-primary text-white">
            <td>Worked Hours</td>
            <td colspan="3"><?= $sumOfWorkedTime ?></td>
            <td>Saldo mensal</td>
            <td> <?= $balance ?></td>
          </tr>
      </tbody>
    </table>
  </div>
</main>
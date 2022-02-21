<main class="content">
    <?php
    renderTitle(
        'Record Point',
        'Keep your point consistent',
        'icofont-check-alt'
    );
    include(TEMPLATE_PATH . "/messages.php")
    ?>
        <div class="card">
            <div class="card-header">
                <h3><?= $today ?></h3>
                <p class="mb-0">Punch clocks made today</p>
            </div>
            <div class="card-body">
                <div class="d-flex m-5 justify-content-around">
                    <span class="record">Entry 1: <?= $workingHours->time1 ?? '---' ?></span>
                    <span class="record">Exit 1: <?= $workingHours->time2 ?? '---' ?></span>
                </div>
                <div class="d-flex m-5 justify-content-around">
                    <span class="record">Entry 2: <?= $workingHours->time3 ?? '---' ?></span>
                    <span class="record">Exit 2: <?= $workingHours->time4 ?? '---' ?></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <a href="clockIn.php" class="btn btn-success btn-lg">
                    <i class="icofont-check mr-1"></i>
                    Punch clock
                </a>
            </div>
        </div>

        <form class="mt-5" action="clockIn.php" method="post">
            <div class="input-group">
                <input type="text" name="forcedTime" id="forcedtime" class="form-control" placeholder="Enter the hour for simulate a punch the clock">
                <button class="btn btn-danger ml-3">
                    Simulate punch the clock
                </button>
            </div>
        </form>
</main>
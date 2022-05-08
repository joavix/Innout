<?php
session_start();
requireValidSession();

$date = (new DateTime())->getTimestamp();
$today = strftime('%b %dth, %Y', $date);
loadTemplateView('day_records', ['today' => $today]);
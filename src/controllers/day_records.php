<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$date = (new DateTime())->getTimestamp();
$today = strftime('%b %dth, %Y', $date);
loadTemplateView('day_records', ['today' => $today]);
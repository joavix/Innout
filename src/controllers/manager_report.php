<?php
session_start();
requireValidSession();

$activeUsersCount = User::getActiveUsersCount();
// Mudar o método para a classe User
$absentUsers = User::getAbsentUsers();

$yearAndMonth = (new DateTime())->format('Y-m');
$seconds = User::getWorkedTimeInMonth($yearAndMonth);
$hoursInMonth = explode(':', getTimeStringFromSeconds($seconds))[0];

loadTemplateView('manager_report', [
  'activeUsersCount' => $activeUsersCount,
  'absentUsers' => $absentUsers,
  'hoursInMonth' => $hoursInMonth
]);
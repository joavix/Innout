<?php
class User extends Model {
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start-date',
        'end-date',
        'is-admin',

    ];

    public static function getActiveUsersCount() {
        return static::getCount(['raw' => 'end_date IS NULL']);
    }

    public static function getAbsentUsers() {
        $today = new DateTime();
        $result = Database::getResultFromQuery("
            SELECT name FROM users
            WHERE end_date IS NULL
            AND id NOT IN (
                SELECT user_id FROM working_hours
                WHERE work_date = '{$today->format('Y-m-d')}'
                AND time1 IS NOT NULL
            )
        ");

        $absentUsers = [];
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($absentUsers, $row['name']);
            }
        }
        return $absentUsers;
    }

    public static function getWorkedTimeInMonth($yearAndMonth) {
        $startDate = (new DateTime("{$yearAndMonth}-1"))->format('Y-m-d');
        $endDate = getLastDayOfMonth($yearAndMonth)->format('Y-m-d');
        $result = static::getResultSetFromSelect([
            'raw' => "work_date BETWEEN '{$startDate}' AND '{$endDate}'"],
            "sum(worked_time) as sum");
        return $result->fetch_assoc()['sum'];
    }

}
<?php

function returnUser()
{
    session_start();
    if (!isset($_SESSION['userId'])) return header("Location: login.html");

    else {
        $id = $_SESSION['userId'];
        $user = returnSingleResult("SELECT * FROM uuser WHERE userId = '$id'");
        if($user['isBanned'] == 1) return header("Location: login.html");
        return $user;
    }
}

function returnSingleResult($query)
{
    require('connection.php');
    while ($row = mysqli_fetch_assoc(mysqli_query($con, $query))) return $row;
}

function deleteRecord($db, $attribute, $criteria){
    $query = "DELETE FROM $db WHERE $attribute = $criteria";
    return runQuery($query);
}

function runQuery($query)
{
    require('connection.php');
    $result = mysqli_query($con, $query);
    return $result;
}

function countOfRecords($query){
    return mysqli_num_rows(runQuery($query));
};

function UserLocker($id, $condition){
    $query = "";
    if($condition == "BAN") {
        $query = "UPDATE uuser SET isBanned = 1 WHERE userId = $id";
    } else {
        $query = "UPDATE uuser SET isBanned = 0 WHERE userId = $id";
    }
    runQuery($query);
}

function ItemApprover($id, $condition){
    $query = "";
    if($condition == "APPROVE") {
        $query = "UPDATE item SET isApproved = 1 WHERE itemId = $id";
    } else {
        $query = "UPDATE item SET isApproved = 0 WHERE itemId = $id";
    }
    runQuery($query);
}

function getCurrentDate(){
    $d = new DateTime("now");
    $result = $d->format('20y-m-d');
    return $result;
}

// Has this date started?
function hasBegun($date){
    if(getCurrentDate() > $date) return true;
    else return false;
}
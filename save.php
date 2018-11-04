<?php

require 'database.php';


if (isset($_POST['token'])  && !empty($_POST['token'])){




   $res= DataBase::getInstance()->getConnection()->prepare("insert into `token` set `token`=? ,`created_datet`=?");
    $res->bindValue(1,$_POST['token']);
    $res->bindValue(2,date('Y-m-d'));

    if ($res->execute()) {
        if ($res->rowCount() > 0)
            echo "";
    }


}




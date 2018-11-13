<?php
/**
 * Created by PhpStorm.
 * User: orencohen
 * Date: 13/11/2018
 * Time: 11:09
 */
require 'requetesSQLTickevent.php';

$ajout = "INSERT INTO Concert (Nom,Date,CP) VALUES ('$_POST[Nom]','$_POST[Date]','$_POST[CP]' )";
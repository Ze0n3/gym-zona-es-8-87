<?php

if (!isset($_SESSION['docu']) || !isset($_SESSION['tipo'])) {
    header("location: ../../../login.html");
    exit();
}

<?php

if (!isset($_SESSION['docu']) || !isset($_SESSION['tipo'])) {
    header("location: ../../index.html");
    exit();
}

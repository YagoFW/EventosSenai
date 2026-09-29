<?php
require_once __DIR__ . "/init.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


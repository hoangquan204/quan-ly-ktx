<?php
function logout()
{
    session_destroy();
    header('Location:  /');
    exit;
}
logout();
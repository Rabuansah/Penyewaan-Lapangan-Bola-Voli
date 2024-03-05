<?php
function userLogin()
{
    $db      = \Config\Database::connect();
    return $db->table('users')->where('id_users', session('id_users'))->get()->getRow();
}

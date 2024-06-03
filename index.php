<?php
require_once "ectr/main.php";

if(isset($_GET['exit'])){Session::close('admin'); Router::redirect('/login');}

Router::get('/', 'index.php');
Router::get('/login', 'login.php');
Router::get('/register', 'register.php');

if($_SESSION['admin']){
    // Admin system List
    Router::get('/contracts', 'contracts.php');
    Router::get('/finance', 'finance.php');
    Router::get('/cvitance', 'cvitance.php');
    Router::get('/profile', 'profile.php');
    Router::get('/rentors', 'rentors.php');
    Router::get('/depo', 'depo.php');
    Router::get('/transaction', 'transaction.php');
    Router::get('/rooms', 'rooms.php');
    Router::get('/tickets', 'tickets.php');
    Router::get('/schet', 'schet.php');
}



// Activate routing 
Router::on();
?>
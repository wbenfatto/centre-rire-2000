<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] === false){header('Location: /');} ?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0d47a1 !important;">
        <span class="navbar-brand"><img src="/assets/img/logo.png" height="60" class="d-inline-block align-top" alt=""></span>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/clients/"><i class="fas fa-users"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="/companies/"><i class="fas fa-briefcase"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="/reports/"><i class="fas fa-chart-pie"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="/agenda/"><i class="fas fa-calendar-alt"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="/logout/"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
</nav>
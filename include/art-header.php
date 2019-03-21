<?php

include 'config.php';
include 'functions.php';

$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$conn->set_charset("utf8");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Can't connect to DB";
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Art Store</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Jaldi|Katibeh" rel="stylesheet">

    <link rel="stylesheet" href="css/assign6.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/assign2-1.js"></script>
	<script src="js/assign6.js"></script>
	
</head>
<body>

	<div class="container" id="site-container">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="top-nav">
		    <div class="d-flex flex-grow-1">
		        
		        <span class="navbar-text" href="#">
		            Welcome to the <b>Art Store</b>. <a href="#">Login</a> or <a href="#">Create New Account</a>
		        </span>
		        <div class="text-right">
		            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
		                <span class="navbar-toggler-icon"></span>
		            </button>
		        </div>
		    </div>
		    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
		        <ul class="navbar-nav ml-auto flex-nowrap">
		            <li class="nav-item">
		                <a href="#" class="nav-link">My Account</a>
		            </li>
		            <li class="nav-item">
		                <a href="./view-wish-list.php" class="nav-link"><i class="fas fa-heart"></i> Wish List <em class="wishListCount"><?php if(count($_SESSION["wish-list"]) > 0) { echo count($_SESSION["wish-list"]); } ?></em></a>
		            </li>
		            <li class="nav-item">
		                <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> Shopping Cart</a>
		            </li>
		            <li class="nav-item">
		                <a href="#" class="nav-link"><i class="fas fa-arrow-right"></i> Checkout</a>
		            </li>
		        </ul>
		    </div>
		</nav>
			
		<header>
			<h1 class="store-title">Art Store</h1>
		</header>

		<nav id="main-nav" class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="browse-paintings.php">Art Works</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Artists</a>
					</li>
				</ul>
			</div>
		</nav>


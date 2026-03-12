<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Project - CSC211</title>
    <style>
    <!-- Center everything, add background colors and padding -->
    <!-- Improved on some style sets I made for the js/css class --> 
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
  
        main {
            width: 60%; 
            margin: 20px auto;
            background: white;
            padding: 20px; 
            border-radius: 6px; 
            box-shadow: 0 0 10px #ccc;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 98%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #004c99;
        }
    </style>
</head>
<body>

<header>

    <!-- banner image for "professional" look -->
    <img src="banner.jpg" alt="Site Banner" style="width:100%; height:auto;">

    <h1>CSC211 Final Project</h1>

</header>

<main>
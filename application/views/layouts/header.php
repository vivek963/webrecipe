<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recipes</title>
        <link rel="shortcut icon" type="image/ico" href="<?php echo base_url('assets/images/favicon.png'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?> ">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/common.js"  type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="<?php echo base_url('assets/css/Style.css'); ?>" rel="stylesheet">
        <style>

            .home-inner {

                background-image: url(<?php echo base_url('assets/images/slider.jpg'); ?>);
                


            }

            .landing {
                position: relative;
                width: 100%;
                height: 80%;
                display: table;
                z-index: -1;
            }


        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-light bg-light stickty-top">
            <div class="container-fluid">
                <a class="navbar-brand" href=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home/allrecipe">Recipes</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home/nutrition">Nutrition</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home/restaurants">Restaurants</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home/about">About</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home/contact">Contact US</a>
                        </li>

                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <li class="navbar-item">
                                <a class="nav-link " href="<?php echo base_url(); ?>login/logout">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="navbar-item">
                                <a class="nav-link " href="<?php echo base_url(); ?>home/login">Login/Signup</a>
                            </li>
                        <?php } ?>

                    </ul>

                </div>

            </div>
        </nav>

        <!---Image-->

        <div class="landing">
            <div class="home-wrap">
                <div class="home-inner">

                </div>

            </div>

        </div>

        <div class="caption text-center">
            <h1>Recipes</h1>
            <h3>Find various types of recipes in one place</h3>
        </div>

<?php

include('authentication.php');
?>

<div id="layoutSidenav_nav">
                
               <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="view-register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Registered Users
                            </a>
                            <a class="nav-link" href="user-contacts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                                Contact Us
                            </a>
                            <a class="nav-link collapsed" href="view-booking" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Booking
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view-booking.php">Booked-users</a>
                                    <a class="nav-link" href="view-approved.php">Approved</a>
                                    <a class="nav-link" href="view-end-transaction.php">End Transactions</a>
                                </nav>   
                            </div>
                            <a class="nav-link" href="user-transact.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-message"></i></div>
                                Transact/Redeem
                            </a>
                        
                            
                        </div>
                    </div>
                    
                </nav>
            </div>


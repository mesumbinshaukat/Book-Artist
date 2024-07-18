<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle
            navigation</span> </a>
    <div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i> </button>
                </span>
            </div>
        </form>
        <!-- search form -->
    </div>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-envelope"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>
                    <li>
                        <ul class="menu">
                            <li><a href="#">
                                    <div class="pull-left"><img src="./images/<?php echo $picture ?>" class="img-circle"
                                            alt="User Image"></div>
                                    <h4><?php echo $username ?></h4>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p><small><i class="fa fa-clock-o"></i> 2 mins</small></p>
                                </a></li>
                            <li><a href="#">
                                    <div class="pull-left"><img src="./images/<?php echo $picture ?>" class="img-circle"
                                            alt="User Image"></div>
                                    <h4><?php echo $username ?></h4>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p><small><i class="fa fa-clock-o"></i> 15 mins</small></p>
                                </a></li>
                            <li><a href="#">
                                    <div class="pull-left"><img src="./images/<?php echo $picture ?>" class="img-circle"
                                            alt="User Image"></div>
                                    <h4><?php echo $username ?></h4>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p><small><i class="fa fa-clock-o"></i> 35 mins</small></p>
                                </a></li>
                            <li><a href="#">
                                    <div class="pull-left"><img src="./images/<?php echo $picture ?>" class="img-circle"
                                            alt="User Image"></div>
                                    <h4><?php echo $username ?></h4>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                    <p><small><i class="fa fa-clock-o"></i> 2 mins</small></p>
                                </a></li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">Check all notifications</a></li>
                </ul>
            </li>
            <!-- messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="icon-megaphone"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">Notifications</li>
                    <li>
                        <ul class="menu">
                            <li><a href="#"><i class="icon-lightbulb"></i> Lorem ipsum dolor sit amet </a>
                            </li>
                            <li><a href="#"><i class="icon-map-pin blue"></i> Lorem ipsum dolor sit amet
                                </a> </li>
                            <li><a href="#"><i class="icon-refresh orange"></i> Lorem ipsum dolor sit amet
                                </a> </li>
                            <li><a href="#"><i class="icon-map-pin blue"></i> Lorem ipsum dolor sit amet
                                </a> </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks Menu -->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="./images/<?php echo $picture ?>" class="user-image" alt="User Image"> <span
                        class="hidden-xs"><?php echo $username ?></span> </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <div class="pull-left user-img"><img src="./images/<?php echo $picture ?>"
                                class="img-responsive" alt="User">
                        </div>
                        <p class="text-left"><?php echo $username ?> <small><?php echo $_COOKIE['email']; ?></small>
                        </p>
                        <!-- <div class="view-link text-left"><a href="#">View Profile</a> </div> -->
                    </li>
                    <!-- <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
                    <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li> -->
                    <li><a href="./logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
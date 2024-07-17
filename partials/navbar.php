<ul class="nav navbar-nav pull-right">
    <li class="nav-item">
        <?php
        if (isset($_COOKIE["login_bool"])) {

            switch ($_COOKIE["user_type"]) {
                case "artist":
                    echo '<a href="artist/index.php" class="nav-link">Artist Dashboard</a>';
                    break;
                case "user":
                    echo '<a href="user/index.php" class="nav-link">User Dashboard</a>';
                    break;
                default:
                    echo '<a href="signin.php" class="nav-link">Signin</a>';
                    break;
            }
        } else {


        ?>
            <a href="signup.php" class="nav-link">
                Signup
            </a>
        <?php
        }
        ?>
    </li>
    <li class="nav-item">
        <?php
        if (isset($_COOKIE["login_bool"])) {

            $user_type = $_COOKIE["user_type"];

            switch ($user_type) {
                case "artist":
                    echo '<a href="./artist/logout.php" class="nav-link">
									<span class="btn btn-sm rounded primary _600">
										Logout
									</span>
								</a>';
                    break;
                case "user":
                    echo '<a href="./user/logout.php" class="nav-link">
									<span class="btn btn-sm rounded primary _600">
										Logout
									</span>
								</a>';
                    break;
                default:
                    echo '<a href="signin.php" class="nav-link">Signin</a>';
                    break;
            }
        } else {

        ?>
            <a href="signin.php" class="nav-link">
                <span class="btn btn-sm rounded primary _600">
                    Signin
                </span>
            </a>
        <?php
        } ?>
    </li>
</ul>

<div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
    <!-- link and dropdown -->
    <ul class="nav navbar-nav nav-md inline text-primary-hover">
        <li class="nav-item">
            <a href="index.php" class="nav-link">
                <span class="nav-text">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="artist.php" class="nav-link">
                <span class="nav-text">Artists</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="about.php" class="nav-link">
                <span class="nav-text">About Us</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="contact.php" class="nav-link">
                <span class="nav-text">Contact Us</span>
            </a>
        </li>
    </ul>
    <!-- / link and dropdown -->
</div>
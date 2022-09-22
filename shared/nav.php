<?php
ob_start();
session_start();


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/layer/');
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/layer/index.php">Layer Company</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION)) : ?>
                <?php if (isset($_SESSION['adminid'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Lawyers
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/layer/lowyer/add.php">Add lawyers</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/layer/lowyer/list.php">Lawyers List</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Users
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/layer/user/add.php">Add users</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/layer/user/list.php">Users List</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['lawyerid']) || (isset($_SESSION['adminid'])) || (isset($_SESSION['userid']))) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Articales
                        </a>
                        <?php if (isset($_SESSION['lawyerid']) || (isset($_SESSION['adminid'])) || (isset($_SESSION['userid']))) : ?>
                            <div class="dropdown-menu">
                                <?php if (isset($_SESSION['lawyerid']) || (isset($_SESSION['adminid']))) : ?>
                                    <a class="dropdown-item" href="/layer/artical/add.php">Create New</a>
                                <?php endif ?>
                                <?php if (isset($_SESSION['lawyerid']) || (isset($_SESSION['adminid'])) || (isset($_SESSION['userid']))) : ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/layer/artical/list.php">Articales List</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['adminid'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Admins
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/layer/admin/add.php">Add admin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/layer/admin/list.php">Admins List</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['userid']) || isset($_SESSION['lawyerid'])) : ?>
                    <li class="nav-item">
                        <a href="/layer/services/list.php" class="nav-link">Our Services</a>
                    </li>
                <?php elseif (isset($_SESSION['adminid']) || isset($_SESSION['lawyerid']) || isset($_SESSION['userid'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-expanded="false">
                            Our Srevices
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/layer/services/add.php">Add Service</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/layer/services/list.php">Services List</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['lawyerid']) || (isset($_SESSION['adminid'])) || (isset($_SESSION['userid']))) : ?>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['adminid'])) : ?>
                            <a href="/layer/admin/profile.php" class="nav-link">Profile</a>
                        <?php elseif (isset($_SESSION['lawyerid'])) : ?>
                            <a href="/layer/lowyer/profile.php" class="nav-link">Profile</a>
                        <?php elseif (isset($_SESSION['userid'])) : ?>
                            <a href="/layer/user/profile.php" class="nav-link">Profile</a>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['adminid']) || isset($_SESSION['userid']) || isset($_SESSION['lawyerid'])) :
        ?>
            <form class="form-inline ml-2 my-2 my-lg-0" method="GET">
                <button name="logout" class="btn btn-danger"> Log Out </button>
            </form>
        <?php else :
        ?>
            <form class="form-inline ml-2 my-2 my-lg-0">
                <a href="/layer/auth/login_admin.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login Admin</a>
            </form>
            <form class="form-inline ml-2 my-2 my-lg-0">
                <a href="/layer/auth/login_lowyer.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login Lawyer</a>
            </form>
            <form class="form-inline ml-2 my-2 my-lg-0">
                <a href="/layer/auth/login_user.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login User</a>
            </form>
        <?php endif; ?>
    </div>
</nav>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url; ?>/css/style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-navy navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">

                    TOOL <span class="logo-1">RENTAL</span>
                    </h6>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url ?>">Ana Səhifə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url ?>user/tools.php">Ləvazimatlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Haqqımızda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Əlaqə</a>
                        </li>
                    </ul>
                    <?php if (!isset($_SESSION['userdata']['id'])) : ?>
                        <form class="d-flex gap-2" role="search">
                            <a href="<?php echo base_url ?>user/login.php" class="btn btn-danger">Login</a>
                            <a href="<?php echo base_url ?>user/register.php" class="btn btn-danger">Register</a>
                        </form>
                    <?php else : ?>
                        <li style="list-style: none;" class="nav-item dropdown text-light">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['userdata']['firstname'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url ?>user/profile.php">Profil</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url ?>user/rent.php">Kirayə olunmuş ləvazimatlar</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url ?>user/signout.php"><span class="fas fa-sign-out-alt"></span>Hesabdan çıxın</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>


                </div>
            </div>
        </nav>
    </header>


    <div class="container">
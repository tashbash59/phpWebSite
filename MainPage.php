<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAI Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/MainPageStyle.css">
</head>



<body>

    <main class="page">

        <header class="header">
            <div class="header__first">
                <a href="MainPage.php" class="header__logo">
                </a>
            </div>
            <div class="header__second">
                <nav class="navbar navbar-expand-xl navbar-dark header__menu ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href=""></a>
                        <button class="navbar-toggler menu__icon" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse menu__body" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto menu__list">
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="t_shirt.php?cat=<?php echo 1 ?>">Футболки
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="menu__link" aria-current="page" href="t_shirt.php?cat=<?php echo 2 ?>"> кофты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="t_shirt.php?cat=<?php echo 3 ?>"> комплекты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="t_shirt.php?cat=<?php echo 4 ?>"> прочее
                                    </a>
                                </li>
                                <?php
                                    session_start();
                                    if (isset($_SESSION['user_id'])) {
                                        if($_SESSION['role'] == 2) {
                                            echo <<<HTML
                                            <li class="nav-item ">
                                                <a class=" menu__link" aria-current="page" href="admin\AdminMain.php"> Администрирование
                                                </a>
                                            </li>
                                        HTML;
                                        }
                                        echo <<<HTML
                                            <li class="nav-item ">
                                                <a class=" menu__link" aria-current="page" href="cart.php"> корзина
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class=" menu__link" aria-current="page" href="scripts\logout.php"> выход
                                                </a>
                                            </li>
                                        HTML;
                                    } else {
                                        echo <<<HTML
                                        <li class="nav-item ">
                                            <a class=" menu__link " data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                                                aria-current="page" href=""> вход/регистрация
                                            </a>
                                        </li>
                                        HTML;
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <div class="main-screen">
            <div class="main-screen__bg ibg">
                <img src="img/background.jpg" alt="">
            </div>
            <div class="main-screen__footer">
                <div class="container ">
                    <div class="col-12 main-screen__FooterTitle text-center">
                        <p>ни дня без <span class="WhiteOnBlack">творчества</span> - ни дня без <span
                                class="WhiteOnBlack">науки!</span></p>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog  right">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./scripts/signIn.php" class="modal-body" method="POST">
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                    </div>
                    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                    </div>
                    <?php 
                        if (!empty($_GET['error'])) {
                            echo "<div class=\"modal-body__MailTitle\">{$_GET['error']}</div>" ;
                        }
                    ?>
                    <div class="modal-body__SignIn text-center">
                        <button class="modal-body__SignInBtn">ВОЙТИ</button>
                    </div>
                    <div class="modal-body__SignInSubTitle text-center mb-3 mt-5">ИЛИ</div>

                </form>
                <div class="modal-body__Registr text-center">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Регистрация</button>
                </div>
            </div>
        </div>
    </div> 
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./scripts/signUp.php" class="modal-body" method="POST">
                    <div class="modal-body__title text-center mb-3">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Регистрация</h5>
                    </div>
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                    </div>
        <!--             <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ЭЛ. ПОЧТА</div>
                    </div> -->
                    <div class="modal-body__Password mb-3">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                    </div>
                 <!--    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">подтвердите пароль</div>
                    </div> -->

                    <div class="modal-body__SignIn  text-center">
                        <button class="modal-body__SignInBtn fz20" name="reg">зарегистрироваться</button>
                    </div>
                    <div class="modal-body__SignInSubTitle text-center mb-3 mt-5">ИЛИ</div>

                </form>
                <div class="modal-body__SignIn text-center">
                    <button class="btn btn-primary modal-body__SignInBtn" data-bs-target="#exampleModalToggle"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Войти</button>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    <script src="js/script.js"></script>

</body>

</html> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mai Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/ProductStyle.css">
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
                                        echo <<<HTML
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

        <section class="Product">
            <?php 
                $item_id = $_GET['id'];
                require __DIR__ . '/scripts/getCurentProduct.php'; 
                $resultList = getItem($item_id);
                echo <<<HTML
                    <div class="Product__title container">
                        <h2 class="col-12 text-center">$resultList[1]</h2>
                    </div>
                HTML; 
            ?>
            <form class="Product__body container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 Product__image">
                        <img src="<?php echo "$resultList[3]"?>" class="img-fluid product-img" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 Product__text info">
                        <div class="info__price text-center">
                            <span><?php echo "$resultList[4]"?></span>
                        </div>
                        <div class="info__description">
                            <?php echo "$resultList[2]"?>
                        </div>
                        <?php
                                    if (isset($_SESSION['user_id'])) {
                                        echo <<<HTML
                                            <div class="info__btn d-flex justify-content-center align-items-center">
                                                <button type="button" class=""  data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><span >Добавить в корзину</span></button>
                                            </div>
                                        HTML;
                                    } else {
                                         echo <<<HTML
                                            <div class="info__btn d-flex justify-content-center align-items-center">
                                                <button type="button" class=""  data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle"><span >Авторизируйтесь</span></button>
                                            </div>
                                        HTML;
                                    }
                                ?>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-auto">
                                <div class="modal__count ">
                                    <div class="modal__title1 text-center mb-5 product-title" id="exampleModalLabel"><?php echo "$resultList[1]"?></div>
                                    <div class="modal__title ">Количество товара</div>
                                    <input type="number" min="1" value="1" class="items-in-box">
                                </div>
                                <div class="modal__size text-center">
                                    <select class="choise" name="" id="">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer mx-auto">
                                <button type="button" class="btn knop1" data-bs-dismiss="modal">Закрыть</button>
                                <button data-cart type="button" class="btn knop2">Добавить в корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </section>


        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog  right">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./scripts/signIn.php" class="modal-body" method="POST">
                  <!--   {% csrf_token %} -->
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                    </div>
                    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                    </div>
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
                    <!-- {% csrf_token %} -->
                    <div class="modal-body__title text-center mb-3">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Регистрация</h5>
                    </div>
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                        <!-- {{ form.username }} -->
                    </div>
        <!--             <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ЭЛ. ПОЧТА</div>
                    </div> -->
                    <div class="modal-body__Password mb-3">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                        <!-- {{ form.password1 }} -->
                    </div>
                 <!--    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">подтвердите пароль</div>
                    </div> -->
                    <!-- {{ form.errors }} -->
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
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog  right">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./scripts/signIn.php" class="modal-body" method="POST">
                  <!--   {% csrf_token %} -->
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                    </div>
                    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                    </div>
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
                    <!-- {% csrf_token %} -->
                    <div class="modal-body__title text-center mb-3">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Регистрация</h5>
                    </div>
                    <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ИМЯ ПОЛЬЗОВАТЕЛЯ</div>
                        <input type="text" class="modal-body__MailInput w-100" name="login" id="login">
                        <!-- {{ form.username }} -->
                    </div>
        <!--             <div class="modal-body__Mail mb-3">
                        <div class="modal-body__MailTitle">ЭЛ. ПОЧТА</div>
                    </div> -->
                    <div class="modal-body__Password mb-3">
                        <div class="modal-body__PasswordTitle">ПАРОЛЬ</div>
                        <input type="Password" class="modal-body__PasswordInput w-100" name="password">
                        <!-- {{ form.password1 }} -->
                    </div>
                 <!--    <div class="modal-body__Password mb-5">
                        <div class="modal-body__PasswordTitle">подтвердите пароль</div>
                    </div> -->
                    <!-- {{ form.errors }} -->
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
        <script src="js/script.js"></script>
</body>

</html>
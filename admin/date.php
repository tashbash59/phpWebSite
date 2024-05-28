<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USATU Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/BagStyle.css">
</head>



<body>

    <main class="page">

        <header class="header">
            <div class="header__first">
                <a href="{% url 'main' %}" class="header__logo">
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
                                    <a class=" menu__link" aria-current="page" href="../t_shirt.php?cat=<?php echo 1 ?>">Футболки
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="menu__link" aria-current="page" href="../t_shirt.php?cat=<?php echo 2 ?>"> кофты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="../t_shirt.php?cat=<?php echo 3 ?>"> комплекты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="../t_shirt.php?cat=<?php echo 4 ?>"> прочее
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
                                                <a class=" menu__link" aria-current="page" href="../cart.php"> корзина
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class=" menu__link" aria-current="page" href="scripts\AdminLogout.php"> выход
                                                </a>
                                            </li>
                                        HTML;
                                    } else {
                                        echo <<<HTML
                                        <li class="nav-item ">
                                            <a class=" menu__link " data-bs-toggle="modal" data-bs-target="#exampleModal1Toggle"
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

        <section class="date">
            <form method="POST" action="orders.php">
                <div class="row">
                    <div class="bag__title title container">
                        <h1 class="col-12 text-center text-dark">Выберите даты</h1>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 mb-3">
                        Даты с 
                        <input type="date" name="from">
                        По
                        <input type="date" name="to">
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Выбрать</button>
                    </div>       
                </div>
            </form>
            <div class="d-flex justify-content-center text-center row">
            </div>
            
        </section>

       

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
</body>

</html>
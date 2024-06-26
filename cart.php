<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USATU Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/BagStyle.css">
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
                                                <a class=" menu__link" aria-current="page" href="admin\AdminLogout.php"> выход
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
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        

        <section class="bag">
            <div class="row">
                <div class="bag__title title container">
                    <h1 class="col-12 text-center text-dark">Мои покупки</h1>
                </div>
            </div>
            
            <button class=" menu__link " data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                                    aria-current="page" href=""> вход/регистрация
            </button>

            <!-- <form class="bag__body"> -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 bag__goods">
                    <?php
                        $user_id = $_SESSION['user_id'];
                        require __DIR__ . '/scripts/getCart.php'; 
                        require __DIR__ . '/scripts/getCurentProduct.php'; 
                        require __DIR__ . '/scripts/getProduct.php'; 
                        $conn = require_once __DIR__ . '/DbConnect.php'; 
                        $resultList = getCartItems($user_id,$conn); 
                        $sum_price = 0;
                        $productsName = "";
                        if (!empty($resultList)) {
                            foreach ($resultList as $row) {
                                $cartItem = getItem($row["product_id"],$conn);
                                $sum_price = $sum_price + $row["quantity"] * $cartItem["3"];
                                $img = getFirtsImg($cartItem[0],$conn);
                                $productsName = $productsName . "\n" . $cartItem[1];
                                echo <<< HTML
                                    <form method="POST" action="scripts/deleteItem.php">
                                        <div class="bag__FirstProduct product">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="product__image">
                                                            <img src="$img[0]" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="product__title"><a href="product.php?id= {$cartItem[0]}">{$cartItem[1]}</a></div>
                                                        <div class="product__size">
                                                            <div class="product__sizeText">размер</div>
                                                            {$row["size"]}
                                                        </div>
                                                        <div class="product__quantity">
                                                            <div class="product__quantity-text">количество</div>
                                                            <div class="product__quantity-number">
                                                                {$row["quantity"]}
                                                            </div>
                                                        </div>
                                                        <div class="product__cost">
                                                            <span>{$cartItem[3]}</span> рублей
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="cart_id" value = "{$row["cart_id"]}">
                                                    <button class="Delete_btn" type="submit"> удалить </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            HTML;
                            }
                        } else {
                            echo "Товара пока нет(";
                        }
                        ?>
                    </div>
                    <?php 
                    $finalPrice = $sum_price + 500;
                    if (!empty($resultList)) {
                        echo <<< HTML
                            <div class="col-md-6 col-sm-12 bag__order details">
                                <div class="details__price d-flex justify-content-between">
                                    <span class="details__priceTitle">Стоимость товаров</span> 
                                    <span class="details__priceNumber">$sum_price rub</span>
                                </div>
                                <div class="details__price d-flex justify-content-between">
                                    <span class="details__priceTitle">Стоимость доставки</span> <span
                                        class="details__priceNumber"> 500 rub</span>
                                </div>
                                <div class="details__price-b d-flex justify-content-between">
                                    <span class="details__priceTitle-b">Итого</span> <span
                                        class="details__priceNumber-b">$finalPrice rub</span>
                                </div>
                                <div class="details__btn text-center" data-toggle="modal" data-target="#exampleModalCenter">
                                    <button>Оформить заказ</button>
                                </div>
                            </div>
                            HTML;
                    }
                    ?>
                </div>
            </div>
            <!-- </form> -->
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Заказ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="scripts/postOrder.php" method="POST">
                        <input type="hidden" name="names" value = "<?php echo htmlspecialchars($productsName);?>">
                        <label for="adress" class="form-label">Адрес доставки</label>
                        <input type="text" class="form-control" name="adress" id="adress" placeholder="Введите адрес">
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Заказать</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
</body>

</html>
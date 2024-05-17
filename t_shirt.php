<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USATU Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/T_shirtStyle.css">
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
                                    <a class=" menu__link" aria-current="page" href="t_shirt.php">Футболки
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="menu__link" aria-current="page" href="{% url 'hoody' %}"> кофты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="{% url 'other' %}"> комплекты
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" menu__link" aria-current="page" href="#"> прочее
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

        <section class="Tshirts">
            <div class="row">
                <div class="Tshirts__title  container">
                    <h1 class="col-12 text-center text-dark">Футболки</h1>
                </div>
            </div>
            <form class="Tshirts__body container">
                <div class="row">
                    <?php
                        require __DIR__ . '/scripts/getProduct.php'; 
                        $resultList = getItems(1);
                        foreach ($resultList as $row) {
                            $img = $row['img'];
                            $price = $row['price'];
                            $name = $row['name'];
                            echo <<<HTML
                                <div class="col-lg-6 col-md-12 Tshirts__FirstProduct product">
                                    <div class="product__image">
                                        <div class="product__bg mx-auto">
                                            <img src="$img" alt="">
                                            <span class="product__price text-center">
                                                $price
                                            </span>                 
                                            <span class="product__btn"><a href="#">подробнее</a></span>          
                                        </div>
                                    </div>
                                    <div class="product__name mx-auto text-center">
                                        <span>$name</span>
                                    </div>
                                </div>
                            HTML;
                        }
                    ?>
                    <!-- 
                    {% for prod in products %}
                    <div class="col-lg-6 col-md-12 Tshirts__FirstProduct product">
                        <div class="product__image">
                            <div class="product__bg mx-auto">
                                <img src="{{ prod.image.url }}" alt="">
                                <span class="product__price text-center">
                                    {{ prod.price }}
                                </span>                 
                                <span class="product__btn"><a href="{% url 'about' prod.id %}">подробнее</a></span>          
                            </div>
                        </div>
                        <div class="product__name mx-auto text-center">
                            <span>{{ prod.name }}</span>
                        </div>
                    </div>
                    {% endfor %} -->
                </div>
            </form>

        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
        <script src="js/script.js"></script>
</body>

</html>

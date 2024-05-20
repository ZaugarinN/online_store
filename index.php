<?php
// Подключение к базе данных SQLite
$db = new PDO('sqlite:' . __DIR__ . '/online_store.db');

// Извлечение категорий товаров
$categories = $db->query('SELECT * FROM categories')->fetchAll(PDO::FETCH_ASSOC);

// Извлечение скидок
$sales = $db->query('SELECT * FROM sales')->fetchAll(PDO::FETCH_ASSOC);

// Извлечение новостей
$news = $db->query('SELECT * FROM news')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Компьютерные Комплектующие</title>
</head>
<body>
    <header>
        <ul class="header-menu">
            <li><a href="#" id="catalog-link">Каталог</a></li>
            <li><a href="#">Избранное</a></li>
            <li><a href="#">Корзина</a></li>
            <li><a href="#">Профиль</a></li>
        </ul>
    </header>

    <div id="catalog-dropdown">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><a href="#"><?php echo htmlspecialchars($category['name']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="banner">
        <input type="text" placeholder="Поиск...">
        <button>Поиск</button>
    </div>

    <div class="container">
        <div class="section section-product">
            <h2>Товары</h2>
            <div class="product-list">
                <?php foreach ($categories as $category): ?>
                    <div class="card product-item">
                        <img src="<?php echo htmlspecialchars($category['image']); ?>" alt="<?php echo htmlspecialchars($category['name']); ?>">
                        <h3><?php echo htmlspecialchars($category['name']); ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section section-sale">
            <h2>Скидки</h2>
            <div class="sale-list">
                <?php foreach ($sales as $sale): ?>
                    <div class="card sale-item">
                        <img src="<?php echo htmlspecialchars($sale['image']); ?>" alt="<?php echo htmlspecialchars($sale['name']); ?>">
                        <h3><?php echo htmlspecialchars($sale['name']); ?></h3>
                        <p><?php echo htmlspecialchars($sale['description']); ?></p>
                        <button>Купить</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="section section-news">
            <h2>Новости</h2>
            <div class="news-list">
                <?php foreach ($news as $newsItem): ?>
                    <div class="card news-item">
                        <h3><?php echo htmlspecialchars($newsItem['title']); ?></h3>
                        <p><?php echo htmlspecialchars($newsItem['description']); ?></p>
                        <a href="<?php echo htmlspecialchars($newsItem['link']); ?>">Читать далее</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="social-links">
            <a href="#"><img src="img/icon/telegram.png" alt="Telegram"></a>
            <a href="#"><img src="img/icon/vkontakte.png" alt="Вконтакте"></a>
            <a href="#"><img src="img/icon/youtube.png" alt="YouTube"></a>
        </div>
    </footer>
</body>
<script src="script.js"></script>
</html>
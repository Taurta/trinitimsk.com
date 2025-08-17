<?php
/**
 * @package trinitimsk
 */
$lang = get_site_language();
?>

<footer id="footer">
    <div class="footer-wrapper">
        <div class="container footer-container">
            <div class="footer-left">
                <div class="logo">
                    <a href="<?= $lang == 'en_US' ? '/en' : '/'; ?>">
                        <img src="<?= getLogoUrl(); ?>" alt="logo">
                    </a>
                </div>
                <div class="footer-text">
                    Конвейерные системы хранения и гардеробы для организаций
                </div>
            </div>
            <div class="footer-right">
                <div class="langs">
                    <? if ($lang == 'en_US') :?>
                        <a href="/">RU</a>
                        <a class="active">EN</a>
                    <? else: ?>
                        <a class="active">RU</a>
                        <a href="/en">EN</a>
                    <? endif; ?>
                </div>
                <div class="footer-contacts">
                    <a class="footer-phone" href="<?= format_phone_to_tel('+7 (905) 510-75-75'); ?>">
                        +7 (905) 510-75-75
                    </a>
                    <a class="footer-email" href="mailto:sale.triniti@yandex.ru">
                        sale.triniti@yandex.ru
                    </a>
                    <a class="privacy-policy" href="/" target="_blank">Политика конфиденциальности</a>
                </div>
            </div>
        </div>
    </div>
    <img class="footer-bg" src="<?= get_stylesheet_directory_uri() . '/assets/imgs/footer-bg.png' ?>" alt="">
</footer>

<div class="popups">
    <div class="popups-bg">
        <div class="popups-close">
            ✕
        </div>
    </div>
    <form id="popup-form" class="popup js-request" data-action="">
        <div class="popup-form-title">
            Оставьте ваш номер телефона
        </div>
        <div class="popup-form-text">
            менеджеры помогут с оптимальным выбором и расчетами.
        </div>
        <div class="form-input">
            <div class="form-input-label">
                Имя
            </div>
            <input type="text" name="name">
        </div>
        <div class="phone-input-wrapper fade-in-up">
            <div class="custom-select-wrapper">
                <div class="custom-select">
                <div class="selected-option"></div>
                <div class="options"></div>
                </div>
            </div>
            <input type="phone" name="phone" placeholder="" />
        </div>
        <div class="form-input">
            <div class="form-input-label">
                Электронная почта
            </div>
            <input type="email" name="email">
        </div>
        <button type="submit">Заказать звонок</button>
        <p class="form-text">
            Нажимая на кнопку, вы даете согласие на обработку персональных данных<br>
            и соглашаетесь с <a href="/" target="_blank">политикой конфиденциальности</a>
        </p>
    </form>
</div>

<div id="notifications-container"></div>

<?php wp_footer(); ?>

</body>
</html>

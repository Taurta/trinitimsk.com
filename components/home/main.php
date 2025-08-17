<?
// Первый экран на главной

global $fields;
?>

<section id="main">
    <div class="container main-container">
        <h1>
            <?= $fields['main_title']; ?>
        </h1>
        <div class="main-order-wrapper">
            <button onclick="openPopup('popup-form')">
                <?= $fields['main_btn_text']; ?>
            </button>
            <div class="main-order-text">
                <?= $fields['main_text']; ?>
            </div>
        </div>
        <? if ($fields['main_imgs']) : ?>
            <div class="main-slider-wrapper">
                <div class="main-slider-prev">
                     <svg width="30" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
                        <path d="M39 68L60 47L39 26" stroke="#b5eeba" vector-effect="non-scaling-stroke"></path>
                    </svg>
                </div>
                <div class="main-slider swiper">
                    <div class="swiper-wrapper">
                        <? foreach ($fields['main_imgs'] as $img) : ?>
                            <img src="<?= $img; ?>" alt="slide" class="swiper-slide">
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="main-slider-pagination swiper-pagination"></div>
                <div class="main-slider-next">
                    <svg width="30" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
                        <path d="M39 68L60 47L39 26" stroke="#b5eeba" vector-effect="non-scaling-stroke"></path>
                    </svg>
                </div>
            </div>
        <? endif; ?>
        <div class="cloud" style="width: 524px; left: -100px; top: 0;"></div>
        <div class="cloud" style="width: 531px; right: -100px; top: 170px;"></div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.main-slider');

        if (!slider) return;

        const swiper = new Swiper(slider, {
            loop: true,
            height: 462,
            spaceBetween: 40,
            pagination: {
                el: '.main-slider-pagination',
                clickable: true,
            },
            navigation: {
                prevEl: '.main-slider-prev',
                nextEl: '.main-slider-next',
            },
            autoplay: {
                delay: 3000,
            },
            speed: 500,
        });
    });
</script>

<style>
    #main {
        background-image: url(<?= get_stylesheet_directory_uri() . '/assets/imgs/main-bg.webp' ?>);
        background-size: 1294px auto;
        background-repeat: no-repeat;
        background-position: center -50px;
        min-height: 1056px;
    }

    .main-container {
        padding-top: 150px;
        position: relative;
        z-index: 2;
    }

    #main h1 {
        font-size: 56px;
        line-height: 62px;
        font-weight: 500;
        margin: 0;
    }

    .main-order-wrapper {
        margin-top: 24px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 40px;
    }

    .main-order-text {
        font-size: 18px;
        line-height: 24px;
    }

    .main-slider-wrapper {
        margin-top: 60px;
        position: relative;
        display: flex;
        align-items: center;
    }

    .main-slider-prev,
    .main-slider-next {
        position: absolute;
        height: 30px;
        width: 30px;
        cursor: pointer;
        border-radius: 50%;
        border: 1px solid #b5eeba;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main-slider-prev:hover,
    .main-slider-next:hover {
        background-color: var(--text);
        border-color: var(--bg);
    }

    .main-slider-prev {
        left: -50px;
    }

    .main-slider-next {
        right: -50px;
    }

    .main-slider-prev svg {
        transform: rotateZ(180deg);
    }

    .main-slider-prev svg path, 
    .main-slider-next svg path {
        transition: var(--transition);
    }

    .main-slider-prev:hover,
    .main-slider-next:hover {
        background-color: var(--text);
    }

    .main-slider-prev:hover svg path,
    .main-slider-next:hover svg path {
        stroke: var(--bg);
    }

    .main-slider {
        border-radius: 24px;
    }

    .main-slider .swiper-slide {
        border-radius: 24px;
    }

    #main .main-slider-wrapper .main-slider-pagination {
        top: calc(100% + 20px);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    #main .main-slider-wrapper .main-slider-pagination .swiper-pagination-bullet {
        background-color: var(--text);
        opacity: 1;
        margin: 0;
        cursor: pointer;
    }

    #main .main-slider-wrapper .main-slider-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
        background-color: #b5eeba;
    }
</style>
<?
// Товары на главной

global $fields;
?>

<section id="products">
    <div class="container products-container">
        <h2><?= $fields['products_title']; ?></h2>
        <p class="products-subtitle"><?= $fields['products_subtitle']; ?></p>
        <? if ($fields['products']) : ?>
            <div class="products-tabs-wrapper">
                <div class="products-tabs-titles">
                    <? foreach ($fields['products'] as $product) : ?>
                        <div class="products-tabs-title">
                            <?= $product['title']; ?>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="products-tabs-body">
                    <? foreach ($fields['products'] as $product) : ?>
                        <div class="products-tab">
                            <div class="products-tab-content">
                                <div class="products-tab-text">
                                    <?= $product['text']; ?>
                                    <button>Заказать</button>
                                </div>
                                <? if ($product['imgs']) : ?>
                                    <div class="products-tab-slider-wrapper">
                                        <div class="products-tab-slider swiper">
                                            <div class="swiper-wrapper">
                                                <? foreach ($product['imgs'] as $img) : ?>
                                                    <img src="<?= $img; ?>" alt="slide" class="swiper-slide">
                                                <? endforeach; ?>
                                            </div>
                                        </div>
                                        <? if (count($product['imgs']) > 1) : ?>
                                            <div class="products-slider-prev">
                                                <svg width="30" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
                                                    <path d="M39 68L60 47L39 26" stroke="#02040c" vector-effect="non-scaling-stroke"></path>
                                                </svg>
                                            </div>
                                        
                                            <div class="products-slider-pagination swiper-pagination"></div>
                                            <div class="products-slider-next">
                                                <svg width="30" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
                                                    <path d="M39 68L60 47L39 26" stroke="#02040c" vector-effect="non-scaling-stroke"></path>
                                                </svg>
                                            </div>
                                        <? endif; ?>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                     <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const tabTitles = document.querySelectorAll(".products-tabs-title");
    const tabContents = document.querySelectorAll(".products-tab");

    tabTitles.forEach((title, index) => {
        title.addEventListener("click", () => {
            tabTitles.forEach(t => t.classList.remove("active"));
            tabContents.forEach(c => c.classList.remove("active"));
            title.classList.add("active");
            tabContents[index].classList.add("active");
        });
    });

    if (tabTitles.length > 0) {
        tabTitles[0].classList.add("active");
        tabContents[0].classList.add("active");
    }

    const sliders_wrappers = document.querySelectorAll('.products-tab-slider-wrapper');

    sliders_wrappers.forEach((wrapper) => {
        
        const slider = wrapper.querySelector('.products-tab-slider');
        const pagination = wrapper.querySelector('.products-slider-pagination');
        const prev = wrapper.querySelector('.products-slider-prev');
        const next = wrapper.querySelector('.products-slider-next');

        new Swiper(slider, {
            loop: true,
            spaceBetween: 40,
            pagination: {
                el: pagination,
                clickable: true,
            },
            navigation: {
                prevEl: prev,
                nextEl: next,
            },
            speed: 500,
        });
    });
});
</script>

<style>
#products {
    padding: 60px 0;
}

#products h2 {
    margin: 0 0 10px;
    font-size: 40px;
    line-height: 54px;
    font-weight: 500;
    text-align: center;
}

#products .products-subtitle {
    margin: 0 0 33px;
    font-size: 20px;
    line-height: 27px;
    text-align: center;
}

.products-tabs-wrapper {
    display: flex;
    flex-direction: column;
}

.products-tabs-titles {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #5a6b60;
    margin-bottom: 15px;
}

.products-tabs-title {
    padding: 0 10px 18px;
    font-size: 15px;
    cursor: pointer;
    color: #666666;
    transition: all 0.5s ease;
    text-align: center;
    border-bottom: 2px solid transparent;
    margin-bottom: -2px;
}

.products-tabs-title:hover {
    color: var(--text);
}

.products-tabs-title.active {
    border-color: var(--text);
    text-shadow: 0 0 1px var(--text);
    color: var(--text);
}

.products-tabs-body {
    position: relative;
    background-image: url(<?= get_stylesheet_directory_uri() . '/assets/imgs/products-bg.png' ?>);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    min-height: 541px;
}

.products-tab {
    display: none;
    animation: fadeIn 0.5s ease;
}

.products-tab.active {
    display: block;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

.products-tab-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    padding-top: 30px;
}

.products-tab-content h3 {
    font-size: 22px;
    line-height: 30px;
    font-weight: 500;
    margin: 0 0 20px;
}

.products-tab-content p {
    font-size: 15px;
    line-height: 20px;
    font-weight: 300;
    margin: 0 0 20px;
}

.products-tab-content button {
    margin-top: 60px;
}

.products-tab-slider-wrapper {
    max-width: 100%;
    position: relative;
    display: flex;
    align-items: center;
}

.products-tab-slider {
    max-width: 580px;
    border-radius: 24px;
    height: 480px;
}

.products-tab-slider .swiper-slide {
     border-radius: 24px;
}

.products-slider-prev,
.products-slider-next {
    position: absolute;
    height: 40px;
    width: 40px;
    cursor: pointer;
    border-radius: 50%;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    background-color: var(--text);
}

.products-slider-prev.swiper-button-disabled,
.products-slider-next.swiper-button-disabled {
    display: none;
}

.products-slider-prev {
    left: 20px;
}

.products-slider-next {
    right: 20px;
}

.products-slider-prev svg {
    transform: rotateZ(180deg);
}

#products .products-tab-slider-wrapper .products-slider-pagination {
    bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

#products .products-tab-slider-wrapper .products-slider-pagination .swiper-pagination-bullet {
    background-color: var(--text);
    opacity: 1;
    margin: 0;
    cursor: pointer;
}

#products .products-tab-slider-wrapper .products-slider-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
    background-color: #b5eeba;
}
</style>
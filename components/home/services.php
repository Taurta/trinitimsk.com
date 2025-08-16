<?
// Услуги на главной

global $fields;
?>

<section id="services">
    <div class="container services-container">
        <div class="services-title">
            <h2>
                <img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/mini-logo.svg' ?>" alt="logo">
                <?= $fields['services_title']; ?>
            </h2>
        </div>
        <? if ($fields['services_cards']) : ?>
            <? foreach ($fields['services_cards'] as $key => $cards) : ?>
            <div class="services-card">
                <h3>
                    <?= $cards['title']; ?>
                </h3>
                <p>
                    <?= $cards['text']; ?>
                </p>
                <div class="services-card-number">
                    <?= str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>
                </div>
            </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</section>

<style>
#services {
    padding: 60px 0;
}

.services-container {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

.services-title {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

#services h2 {
    line-height: 48px;
    font-size: 40px;
    font-weight: 500;
    margin: 0;
    text-indent: 47px;
    position: relative;
}

#services h2 img {
    position: absolute;
    width: 34px;
    left: 0;
    top: -7px;
}

.services-card {
    position: relative;
    padding: 40px 33px 24px;
    min-height: 305px;
    height: 100%;
    border-radius: 12px;
    background-image: linear-gradient(0.375turn, rgba(11, 18, 16, 1) 0%, rgba(12, 36, 28, 1) 100%);
}

.services-card h3 {
    margin: 0 0 15px;
    line-height: 27px;
    font-size: 20px;
}

.services-card p {
    margin: 0;
    line-height: 20px;
    font-size: 15px;
    font-weight: 300;
}

.services-card-number {
    position: absolute;
    bottom: 24px;
    font-size: 15px;
    line-height: 23px;
    font-weight: 500px;
}
</style>
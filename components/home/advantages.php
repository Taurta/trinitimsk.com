<?
// Преимущества на главной

global $fields;
?>

<section id="advantages">
    <div class="container advantages-container">
        <h2>
            <?= $fields['advantages_title']; ?>
        </h2>
        <? if ($fields['advantages_cards']) : ?>
            <? foreach ($fields['advantages_cards'] as $key => $cards) : ?>
            <div class="advantages-card">
                <h3>
                    <?= $cards['title']; ?>
                </h3>
                <p>
                    <?= $cards['text']; ?>
                </p>
                <div class="advantages-card-number">
                    <?= str_pad($key + 1, 2, "0", STR_PAD_LEFT) ?>.
                </div>
            </div>
            <? endforeach; ?>
        <? endif; ?>
        <div class="cloud" style="width: 584px; left: -150px; top: -150px;"></div>
        <div class="cloud" style="width: 723px; right: -165px; top: 240px;"></div>
    </div>
</section>

<style>
#advantages {
    padding: 60px 0;
}

.advantages-container {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
}

#advantages h2 {
    line-height: 48px;
    font-size: 40px;
    font-weight: 500;
    display: flex;
    align-items: center;
    height: 100%;
    margin: 0;
}

.advantages-card {
    position: relative;
    padding: 40px 33px 24px;
    min-height: 305px;
    height: 100%;
    border-radius: 12px;
    background-image: linear-gradient(0.375turn, rgba(11, 18, 16, 1) 0%, rgba(12, 36, 28, 1) 100%);
}

.advantages-card h3 {
    margin: 0 0 15px;
    line-height: 27px;
    font-size: 20px;
}

.advantages-card p {
    margin: 0;
    line-height: 20px;
    font-size: 15px;
    font-weight: 300;
}

.advantages-card-number {
    position: absolute;
    bottom: 24px;
    font-size: 15px;
    line-height: 23px;
    font-weight: 500px;
}
</style>
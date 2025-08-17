<?
// Форма на главной

global $fields;
?>

<section id="form">
    <div class="container form-container">
        <h2>Оставьте ваш номер телефона —<br>менеджеры помогут с оптимальным выбором и расчетами.</h2>
        <form class="js-request" data-action="">
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
            <div class="form-select">
                <div class="form-select-label">
                    Выберите интересующую вас систему
                </div>
                <select name="product">
                    <option value="Гардеробные системы">Гардеробные системы</option>
                    <option value="Гардеробы Magrus">Гардеробы Magrus</option>
                    <option value="Конвейерные системы">Конвейерные системы</option>
                    <option value="Системы для хранения">Системы для хранения</option>
                    <option value="Гардероб для дома">Гардероб для дома</option>
                    <option value="Столешницы">Столешницы</option>
                </select>
            </div>
            <button type="submit">Заказать звонок</button>
            <p class="form-text">
                Нажимая на кнопку, вы даете согласие на обработку персональных данных<br>
                и соглашаетесь с <a href="/" target="_blank">политикой конфиденциальности</a>
            </p>
        </form>
        <img class="form-bg" src="<?= get_stylesheet_directory_uri() . '/assets/imgs/form-bg.png' ?>" alt="bg">
    </div>
</section>

<script>

</script>

<style>
#form {
    padding: 45px 0 75px;
    background-image: -webkit-linear-gradient(top, rgba(2, 3, 18, 0), rgb(1, 3, 17));
}

#form h2 {
    font-size: 18px;
    line-height: 1.35;
    font-weight: 500;
    margin-bottom: 40px;
    text-align: center;
    max-width: 560px;
    position: relative;
    z-index: 10;
}

.form-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
}

.form-container form {
    width: 100%;
    max-width: 560px;
    position: relative;
    z-index: 10;
}

#form button {
    height: 56px;
    width: 100%;
}

.form-bg {
    position: absolute;
    opacity: 0.1;
    width: 100vw;
    z-index: 0;
    top: -8vw;
}
</style>
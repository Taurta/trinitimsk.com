<b>Имя: </b><?= $data['name'] ?? '-'?></br>
<b>Телефон: </b><?= $data['phone'] ?? '-'?></br>
<b>Email: </b><?= $data['email'] ?? '-'?></br>
<? if ($data['product']) : ?>
<b>Услуга: </b><?= $data['product']?></br>
<? endif;?>
<b>utm_source: </b><?= $data['utm_source'] ?? '-'?></br>
<b>utm_medium: </b><?= $data['utm_medium'] ?? '-'?></br>
<b>utm_campaign: </b><?= $data['utm_campaign'] ?? '-'?></br>
<b>utm_term: </b><?= $data['utm_term'] ?? '-'?></br>
<b>utm_content: </b><?= $data['utm_content'] ?? '-'?>
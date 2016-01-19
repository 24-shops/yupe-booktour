<div>Указанное имя: <?php echo $model->name ?></div>
<div>Указанная фамилия: <?php echo $model->surname ?></div>
<?php if ('' != $model->patronymic): ?>
	<div>Указанное отчество: <?php echo $model->patronymic ?></div>
<?php endif ?>
<div>Указанная дата рождения:  <?php echo $model->date_of_birth ?></div>
<?php if ('' != $model->phone): ?>
	<div>Указанный контактный номер телефона: <?php echo $model->phone ?></div>
<?php endif ?>
<?php if ('' != $model->mail): ?>
	<div>Указанный email-адрес: <?php echo $model->mail ?></div>
<?php endif ?>
<div>Дата экскурсии :<?php echo $model->date_reservation?></div>
<div>Дата бронирования: <?php  echo date('d.m.y') ?></div>
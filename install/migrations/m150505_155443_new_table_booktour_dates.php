<?php

class m150505_155443_new_table_booktour_dates extends yupe\components\DbMigration
{
	public function safeUp()
	{
		$this->createTable('{{booktour_dates}}', [
			'id'               => 'pk',                            // Идентификатор
			'date_reservation' => 'date NOT NULL',             // Дата бронирования
			'opening_booking'  => 'date DEFAULT NULL',         // Открытие бронирования
			'closing_booking'  => 'date DEFAULT NULL',         // Закрытие бронирования
			// 'maximum_quantity' => 'integer DEFAULT NULL',          // Максимальное количество посететелей
			'status'           => "integer NOT NULL DEFAULT '0'"   // Статус (открыт, закрыт)
		], $this->getOptions());

		$this->alterColumn(
			'{{booktour_dates}}',
			'date_reservation',
			'DATE NOT NULL'
		);
	}

	public function safeDown()
	{
		$this->dropTable('{{booktour_dates}}');
	}
	
}
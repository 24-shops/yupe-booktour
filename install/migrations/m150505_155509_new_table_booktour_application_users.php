<?php

class m150505_155509_new_table_booktour_application_users extends yupe\components\DbMigration
{
	public function safeUp()
	{
		$this->createTable('{{booktour_application_users}}', [
			'id'               => "pk",                    // Id
			'surname'          => "string NOT NULL",       // Фамилия
			'name'             => "string NOT NULL",       // Имя
			'patronymic'       => "string NOT NULL",       // Отчество
			'mail'             => "string NOT NULL",       // Почта
			'phone'            => "string NOT NULL",       // Телефон
			'date_of_birth'    => "datetime NOT NULL",     // Дата рожнения
			'date_reservation' => "datetime NOT NULL",     // Дата бронирования
			'quantity'         => "integer DEFAULT '1'",               // Количество человек
			'dates_id'         => "integer",               // Внешний ключ на дату
		], $this->getOptions());

		$this->addForeignKey(
            "fk_{{booktour_application_users}}_dates_id",
            '{{booktour_application_users}}',
            'dates_id',
            '{{booktour_dates}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
	}

	public function safeDown()
	{
		$this->dropTableWithForeignKeys('{{booktour_application_users}}');
	}
}
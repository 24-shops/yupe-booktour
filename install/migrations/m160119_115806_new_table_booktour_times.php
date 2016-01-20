<?php

class m160119_115806_new_table_booktour_times extends yupe\components\DbMigration
{
	public function safeUp()
	{
		$this->createTable('{{booktour_times}}', [
			'id' 					=> 'pk',
			'time' 					=> 'time NOT NULL',
			'maximum_quantity' 		=> 'integer DEFAULT NULL',
			'dates_id' 				=> 'integer',
			'status'           		=> "integer NOT NULL DEFAULT '0'"   // Статус (открыт, закрыт)
		], $this->getOptions());
		


		$this->addForeignKey(
			"fk_{{booktour_times}}_dates_id",
			'{{booktour_times}}',
			'dates_id',
			'{{booktour_dates}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}


	public function safeDown()
	{
		$this->dropTableWithForeignKeys('{{booktour_times}}');
/*		echo "m160119_115806_new_table_booktour_times does not support migration down.\n";
		return false;*/
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
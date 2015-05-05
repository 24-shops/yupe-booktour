<?php
use yupe\components\WebModule;
class BooktourModule extends WebModule
{
	const VERSION = '0.1';

	public function getVersion()
	{
		return self::VERSION;
	}

	// public function getCategory()
	// {
	// 	return Yii::t('BooktourModule.booktour', 'Users');
	// }

	public function getName()
	{
		return Yii::t('BooktourModule.booktour', 'Booking tours');
	}

	public function getDescription()
	{
		return Yii::t('BooktourModule.booktour', 'The module allows you to book a place on a tour, at a specified time moderator');
	}

	public function getAuthor()
	{
		return Yii::t('BooktourModule.booktour', 'UnnamedTeam');
	}

	public function getAuthorEmail()
	{
		return Yii::t('BooktourModule.booktour', 'max100491@mail.ru');
	}

	public function getAdminPageLink()
	{
		return '/booktour/datesBackend/index';
	}

	public function getIcon()
	{
		return "fa fa-child";
	}

	public function init()
	{
		$this->setImport(array(
			'booktour.models.*',
			'booktour.components.*',
		));
		parent::init();
	}
}

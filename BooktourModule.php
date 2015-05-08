<?php
use yupe\components\WebModule;
class BooktourModule extends WebModule
{
	public $title = 'Бронирование экскурсий';
	public $numberOfMonths = '1,2';

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

	public function getEditableParams()
	{
		return [
			'title',
			'numberOfMonths',
		];
	}

	public function getParamsLabels()
	{
		return [
			'title'=>Yii::t('BooktourModule.booktour', 'Title'),
			'numberOfMonths'=>Yii::t('BooktourModule.booktour', 'Number of months'),
		];
	}

	public function getEditableParamsGroups()
	{
		return [
			'main'=>[
				'label'=>Yii::t('BooktourModule.booktour', 'Main settings'),
				'items'=>[
					'title'
				]
			],
			'calendar'=>[
				'label'=>Yii::t('BooktourModule.booktour', 'Сalendar'),
				'items'=>[
					'numberOfMonths',
				]
			]
		];
	}

	public function getNavigation()
	{
		return [
			[
				'label' => Yii::t('BooktourModule.booktour', 'Список дат бронирования'),
				'url'   => ['/booktour/datesBackend/index'],
				'icon'  => "fa fa-fw fa-list-alt",
			],
			[
				'label' => Yii::t('BooktourModule.booktour', 'Добавить дату бронирования'),
				'url'   => ['/booktour/datesBackend/create'],
				'icon'  => "fa fa-fw fa-plus-square",
			],
			[
				'label' => Yii::t('BooktourModule.booktour', 'Заявки на бронь'),
				'url'   => ['/booktour/reservationBackend/index'],
				'icon'  => "fa fa-fw fa-list-alt",
			]
		];
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

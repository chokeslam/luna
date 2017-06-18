<?php
/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2017 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Lyrasoft\Luna\Contact;

use Lyrasoft\Luna\Helper\LunaHelper;
use Windwalker\Core\Language\Translator;

/**
 * The ContactHelper class.
 *
 * @since  __DEPLOY_VERSION__
 */
class ContactHelper
{
	/**
	 * Property map.
	 *
	 * @var  array
	 */
	public static $map = [
		-1 => [
			'symbol' => 'cancel',
			'icon' => 'glyphicon glyphicon-remove fa fa-remove',
			'color' => 'danger',
		],
		0 => [
			'symbol' => 'pending',
			'icon' => 'glyphicon glyphicon-time fa fa-clock-o',
			'color' => 'warning',
		],
		1 => [
			'symbol' => 'handling',
			'icon' => 'glyphicon glyphicon-transfer fa fa-exchange',
			'color' => 'info',
		],
		2 => [
			'symbol' => 'done',
			'icon' => 'glyphicon glyphicon-ok fa fa-check',
			'color' => 'success',
		],
	];

	/**
	 * getStateSymbol
	 *
	 * @param int $state
	 *
	 * @return  string
	 */
	public static function getStateSymbol($state)
	{
		return static::getStateData('symbol', $state, 'unknown');
	}

	/**
	 * translateState
	 *
	 * @param int|string $state
	 *
	 * @return  string
	 */
	public static function translateState($state)
	{
		if (is_numeric($state))
		{
			$state = static::getStateSymbol((int) $state);
		}

		$langPrefix = LunaHelper::getLangPrefix();

		return Translator::translate($langPrefix . 'contact.state.' . $state);
	}

	/**
	 * getStateIcon
	 *
	 * @param int $state
	 *
	 * @return  string
	 */
	public static function getStateIcon($state)
	{
		return static::getStateData('icon', $state, 'glyphicon glyphicon-question-sign fa fa-question-circle');
	}

	/**
	 * getStateColor
	 *
	 * @param int $state
	 *
	 * @return  string
	 */
	public static function getStateColor($state)
	{
		return static::getStateData('color', $state, 'default');
	}

	/**
	 * getStateData
	 *
	 * @param string $type
	 * @param int    $state
	 * @param mixed  $default
	 *
	 * @return  null
	 */
	public static function getStateData($type, $state, $default = null)
	{
		if (isset(static::$map[$state][$type]))
		{
			return static::$map[$state][$type];
		}

		return $default;
	}
}
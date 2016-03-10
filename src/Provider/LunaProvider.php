<?php
/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Lyrasoft\Luna\Provider;

use Lyrasoft\Luna\LunaPackage;
use Windwalker\Core\Console\WindwalkerConsole;
use Windwalker\Core\Renderer\RendererFactory;
use Windwalker\DI\Container;
use Windwalker\DI\ServiceProviderInterface;
use Windwalker\Utilities\Queue\Priority;

/**
 * The LunaProvider class.
 *
 * @since  {DEPLOY_VERSION}
 */
class LunaProvider implements ServiceProviderInterface
{
	/**
	 * Property luna.
	 *
	 * @var  LunaPackage
	 */
	protected $luna;

	/**
	 * LunaProvider constructor.
	 *
	 * @param  LunaPackage  $luna
	 */
	public function __construct(LunaPackage $luna)
	{
		$this->luna = $luna;
	}

	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container $container The DI container.
	 *
	 * @return  void
	 */
	public function register(Container $container)
	{
		if ($container->get('system.application') instanceof WindwalkerConsole)
		{
			return;
		}

		/** @var RendererFactory $factory */
		$factory = $container->get('renderer.factory');

		$factory->addGlobalPath($this->luna->getDir() . '/Resources/templates', Priority::LOW - 25);
	}
}

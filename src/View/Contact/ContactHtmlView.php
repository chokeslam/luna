<?php
/**
 * Part of Luna project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Lyrasoft\Luna\View\Contact;

use Lyrasoft\Luna\Helper\LunaHelper;
use Phoenix\Script\PhoenixScript;
use Phoenix\View\EditView;

/**
 * The ContactHtmlView class.
 * 
 * @since  1.0
 */
class ContactHtmlView extends EditView
{
	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'Contact';

	/**
	 * init
	 *
	 * @return  void
	 */
	protected function init()
	{
		$this->langPrefix = LunaHelper::getLangPrefix();
	}

	/**
	 * prepareData
	 *
	 * @param \Windwalker\Data\Data $data
	 *
	 * @return  void
	 */
	protected function prepareData($data)
	{
		parent::prepareData($data);

		$this->prepareScripts();
		$this->prepareMetadata();
	}

	/**
	 * prepareDocument
	 *
	 * @return  void
	 */
	protected function prepareScripts()
	{
		PhoenixScript::formValidation('#contact-form');
	}

	/**
	 * prepareMetadata
	 *
	 * @return  void
	 */
	protected function prepareMetadata()
	{
		$this->setTitle();
	}
}
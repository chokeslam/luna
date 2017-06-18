<?php
/**
 * Part of Luna project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Lyrasoft\Luna\Admin\Record;

use Lyrasoft\Luna\Admin\Record\Traits\ContactDataTrait;
use Lyrasoft\Luna\Table\LunaTable;
use Windwalker\Event\Event;
use Windwalker\Record\Record;

/**
 * The ContactRecord class.
 *
 * @since  1.0
 */
class ContactRecord extends Record
{
	use ContactDataTrait;

	/**
	 * Property table.
	 *
	 * @var  string
	 */
	protected $table = LunaTable::CONTACTS;

	/**
	 * Property keys.
	 *
	 * @var  string
	 */
	protected $keys = 'id';

	/**
	 * Property casts.
	 *
	 * @var  array
	 */
	protected $casts = [
		'state' => 'integer',
		'details' => 'json'
	];

	/**
	 * setDetailsValue
	 *
	 * @param mixed $value
	 *
	 * @return  void
	 */
	protected function setDetailsValue($value)
	{
		$this->data['details'] = is_string($value) ? $value : json_encode($value);
	}

	/**
	 * onAfterLoad
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterLoad(Event $event)
	{
		// Add your logic
	}

	/**
	 * onAfterStore
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterStore(Event $event)
	{
		// Add your logic
	}

	/**
	 * onAfterDelete
	 *
	 * @param Event $event
	 *
	 * @return  void
	 */
	public function onAfterDelete(Event $event)
	{
		// Add your logic
	}
}
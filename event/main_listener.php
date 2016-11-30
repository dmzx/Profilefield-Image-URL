<?php
/**
*
* @package phpBB Extension - Profilefield Image URL
* @copyright (c) 2016 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\profilefield\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{

	/* @var \dmzx\profilefield\core\profilefield */
	protected $profilefield;

	/* @var \phpbb\template\template */
	protected $template;

	/**
	 * Constructor
	 *
	 * @param \dmzx\profilefield\core\profilefield			$profilefield
	 * @param \phpbb\template\template						$template
	 */
	public function __construct(
		\dmzx\profilefield\core\profilefield $profilefield,
		\phpbb\template\template $template)
	{
		$this->profilefield	= $profilefield;
		$this->template		= $template;
	}

	public static function getSubscribedEvents()
	{
		return array(
			'core.user_setup'							=> 'load_language_on_setup',
			'core.memberlist_prepare_profile_data'		=> 'posting_modify_template_vars',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext	= $event['lang_set_ext'];
		$lang_set_ext[]	= array(
			'ext_name' => 'dmzx/profilefield',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function posting_modify_template_vars($event)
	{
		$this->template->assign_block_vars('profilefield',
			$this->profilefield->view_profilefield($event['data']['user_id']
		));
	}
}

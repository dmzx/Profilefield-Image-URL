<?php
/**
*
* @package phpBB Extension - Profilefield Image URL
* @copyright (c) 2016 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\profilefield\core;

use Symfony\Component\DependencyInjection\Container;

class profilefield
{
	/** @var \phpbb\profilefields\manager */
	protected $profilefields_manager;

	/**
	 * Constructor
	 *
	 * @param \phpbb\profilefields\manager		$profilefields_manager
	 */
	public function __construct(
		\phpbb\profilefields\manager $profilefields_manager)
	{
		$this->profilefields_manager = $profilefields_manager;
	}

	public function view_profilefield($user_id)
	{
		$profile_fields = $this->profilefields_manager->grab_profile_fields_data($user_id);

		if (!empty($profile_fields))
		{
			$profilefield_image = $profile_fields[$user_id]['profilefield_image']['value'];
		}
		else
		{
			$profilefield_image = '';
		}

		$template_array = array(
			'U_PROFILEFIELD_IMAGE_ID'	=> $profilefield_image ? $profilefield_image : false,
		);
		return $template_array;
	}
}

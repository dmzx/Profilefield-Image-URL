<?php
/**
*
* @package phpBB Extension - Profilefield Image URL
* @copyright (c) 2016 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\profilefield\migrations;

class profilefield_install extends \phpbb\db\migration\profilefield_base_migration
{
	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'create_custom_field'))),
		);
	}

	protected $profilefield_name = 'profilefield_image';

	protected $profilefield_database_type = array('VCHAR', '');

	protected $profilefield_data = array(
		'field_name'			=> 'profilefield_image',
		'field_type'			=> 'profilefields.type.url',
		'field_ident'			=> 'profilefield_image',
		'field_length'			=> '40',
		'field_minlen'			=> '12',
		'field_maxlen'			=> '255',
		'field_novalue'			=> '',
		'field_default_value'	=> '',
		'field_validation'		=> '',
		'field_required'		=> 0,
		'field_show_novalue'	=> 0,
		'field_show_on_reg'		=> 0,
		'field_show_on_pm'		=> 0,
		'field_show_on_vt'		=> 0,
		'field_show_profile'	=> 0,
		'field_hide'			=> 0,
		'field_no_view'			=> 0,
		'field_active'			=> 1,
		'field_is_contact'		=> 0,
		'field_contact_desc'	=> 'PROFILEFIELD_IMAGE',
		'field_contact_url'		=> '%s',
	);
}

<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Aaron Lauterer 2009-2015
 * @author     Aaron Lauterer <aaron@lauterer.at>
 * @package    la_bookingcal
 * @license    LGPL
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['la_bookingcal']        = '{title_legend},name,headline,type;{config_legend},la_bookingcal_object,la_bookingcal_years;{template_legend:hide},la_bookingcal_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['la_bookingcal_object'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['la_bookingcal_object'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options_callback'        => array('tl_module_la_bookingcal', 'getObjects'),
	'eval'                    => array('mandatory'=>true, 'multiple'=>true),
    'sql'                     => "int(10) unsigned NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['la_bookingcal_years'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['la_bookingcal_years'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50'),
    'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['la_bookingcal_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['la_bookingcal_template'],
	'default'                 => 'la_bookingcal_standard',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $this->getTemplateGroup('la_bookingcal_'),
	'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default ''"
);



/**
 * Class tl_module_calendar
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2010
 * @author     Leo Feyer <http://www.typolight.org>
 * @package    Controller
 */
class tl_module_la_bookingcal extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Get all calendars and return them as array
	 * @return array
	 */
	public function getObjects()
	{
		if (!$this->User->isAdmin && !is_array($this->User->calendars))
		{
			return array();
		}

		$arrForms = array();
		$objForms = $this->Database->execute("SELECT id, name FROM tl_la_bookingcal_objects ORDER BY name");

		while ($objForms->next())
		{
			$arrForms[$objForms->id] = $objForms->name;
		}

		return $arrForms;
	}
}

?>
<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Aaron Lauterer 2009 
 * @author     Aaron Lauterer aaron@lauterer.at 
 * @package    la_bookingcal 
 * @license    LGPL 
 * @filesource
 */

 
array_insert($GLOBALS['BE_MOD']['content'], 2, array
(
	'la_bookingcal' => array
	(
		'tables'     => array('tl_la_bookingcal_objects', 'tl_la_bookingcal_dates'),
		'icon'       => 'system/modules/la_bookingcal/html/icon.gif'
	)
));
 
 /**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 9, array
(
	'la_bookingcal' => array
	(
		'la_bookingcal'        => 'ModuleBookingcal'
	)
));

/**
 * CSS Files
 */
$GLOBALS['TL_CSS'][] = 'system/modules/la_bookingcal/html/bookingcal.css|screen,handheld,print'; 
 
?>
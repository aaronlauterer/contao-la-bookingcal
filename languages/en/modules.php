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
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['MOD']['la_bookingcal'] = array('Bookingcalendar', 'Manage bookings for objects like a holiday house.');
$GLOBALS['TL_LANG']['FMD']['la_bookingcal'] = array('Bookingcalendar', 'adds a la_bookingcalendar to the page.');


/**
 * -----------------------------------------------------------------------------
 * Objects
 * -----------------------------------------------------------------------------
 */
/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['name']				= array('Name','Name of the object.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['title_legend']		= 'Name';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['new']   				= array('New object', 'Create a new object');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['copy']				= array('Copy', 'Copy object ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['edit']				= array('Edit', 'Edit object ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['delete']				= array('Delete', 'Delete object ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['show']				= array('Infos', 'Show informations for object ID %s');

/**
 * -----------------------------------------------------------------------------
 * Dates
 * -----------------------------------------------------------------------------
 */
 /**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startDate']				= array('Start','Start of the booking.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDate']				= array('End','End of the booking.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull']				= array('Full day start','The whole first day will be booked, no change.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull']				= array('Full day end','The whole last day will be booked, no change.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['comment']				    = array('Comment','Notes for the booking.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['title_legend']		    = 'Period';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['full_legend']		    = 'Full Days';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['comment_legend']	        = 'Comment';


/**
 * Error MSGs
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']		= 'Interferes with other bookings.';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateWithinRange']	= '%s booking(s) are within that period.';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDatebefore']		= 'The end of the booking can\'t be before the start.';
/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['new']   				= array('New Booking', 'Create a new booking.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['copy']				= array('Copy', 'Copy booking ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['edit']				= array('Edit', 'Edit booking ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['delete']				= array('Delete', 'Delete booking ID %s');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['show']				= array('Infos', 'Show information for booking ID %s');


?>
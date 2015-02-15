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
 * @package    bookingcal 
 * @license    LGPL 
 * @filesource
 */


/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['startDate']				= array('Start','Start of the booking.');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['endDate']				= array('End','End of the booking.');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['startFull']				= array('Full day start','The whole first day will be booked, no change.');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['endFull']				= array('Full day end','The whole last day will be booked, no change.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['title_legend']		= 'Period';
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['full_legend']		= 'Full Days';


/**
 * Error MSGs
 */
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['dateCollision']		= 'Interferes with other bookings.';
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['dateWithinRange']	= '%s booking(s) are within that period.';
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['endDatebefore']		= 'The end of the booking can\'t be before the start.';
/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['new']   				= array('New Booking', 'Create a new booking.');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['copy']				= array('Copy', 'Copy booking ID %s');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['edit']				= array('Edit', 'Edit booking ID %s');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['delete']				= array('Delete', 'Delete booking ID %s');
$GLOBALS['TL_LANG']['tl_bookingcal_dates']['show']				= array('Infos', 'Show information for booking ID %s');
?>
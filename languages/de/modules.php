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
$GLOBALS['TL_LANG']['MOD']['la_bookingcal'] = array('Belegungskalender', 'Belegungen von Objekten wie zum Beispiel Ferienhäusern verwalten.');
$GLOBALS['TL_LANG']['FMD']['la_bookingcal'] = array('Belegungskalender', 'fügt der Seite einen Belegungskalender hinzu.');

/**
 * -----------------------------------------------------------------------------
 * Objects
 * -----------------------------------------------------------------------------
 */
/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['name']				= array('Name','Name des Objektes.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['title_legend']		= 'Name';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['new']   				= array('Neues Objekt', 'Ein neues Objekt erstellen');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['copy']				= array('Kopieren', 'Objekt ID %s kopieren');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['edit']				= array('Bearbeiten', 'Objekt ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['delete']				= array('Löschen', 'Objekt ID %s löschen');
$GLOBALS['TL_LANG']['tl_la_bookingcal_objects']['show']				= array('Informationen', 'Informationen zu Objekt ID %s anzeigen');


/**
 * -----------------------------------------------------------------------------
 * Dates
 * -----------------------------------------------------------------------------
 */
/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startDate']				= array('Beginn','Beginn der Buchung.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDate']				= array('Ende','Ende der Buchung.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull']				= array('Ganzer Tag Beginn','Der erste Tag wird komplett gebucht, ohne wechsel.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull']				= array('Ganzer Tag Ende','Der letzte Tag wird komplett gebucht, ohne wechsel.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['comment']				= array('Kommentar','Notizen zu der Buchung.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['title_legend']		= 'Zeitraum';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['full_legend']		= 'Ganze Tage';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['comment_legend']		= 'Kommentar';


/**
 * Error MSGs
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']		= 'Überschneidet sich mit anderen Buchungen.';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateWithinRange']	= '%s Buchung(en) befinden sich in diesem Zeitraum.';
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDatebefore']		= 'Das Enddatum kann nicht vor dem Startdatum liegen.';
/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['new']   				= array('Neue Belegung', 'Eine neue Belegung erstellen.');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['copy']				= array('Kopieren', 'Belegung ID %s kopieren');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['edit']				= array('Bearbeiten', 'Belegung ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['delete']				= array('Löschen', 'Belegung ID %s löschen');
$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['show']				= array('Informationen', 'Informationen zu Belegung ID %s anzeigen');
?>
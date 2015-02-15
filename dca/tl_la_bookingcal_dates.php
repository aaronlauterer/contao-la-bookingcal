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


/**
 * Table tl_la_bookingcal_dates 
 */
$GLOBALS['TL_DCA']['tl_la_bookingcal_dates'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'ptable'					  => 'tl_la_bookingcal_objects',
        'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),  
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('endDate DESC'),
			'headerFields'			  => array('name'),
			'flag'                    => 1,
			'child_record_callback'   => array('tl_la_bookingcal_dates', 'la_bookingcal_display'),
			'panelLayout'             => 'filter;sort;limit',
		),
		'label' => array
		(
			'fields'                  => array('startDate,endDate'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{title_legend},startDate,endDate;{full_legend},startFull,endFull'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
        'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
        'pid' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
		'startDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startDate'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
			'save_callback' => array
			(
				array('tl_la_bookingcal_dates', 'evalDateStart')
			),
            'sql'                     => "varchar(10) NOT NULL default ''"

		),
		'endDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDate'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
			'save_callback' => array
			(
				array('tl_la_bookingcal_dates', 'evalDateEnd')
			),
            'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'startFull' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
		'endFull' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
            'sql'                     => "char(1) NOT NULL default ''"
		)

	)
);

class tl_la_bookingcal_dates extends Backend
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
	 * Add indicating icon for full days
	 * @param array
	 * @return string
	 */
	public function la_bookingcal_display($arrRow)
	{
		/**
		 * Show Image according if the full day is used or not
		 */
		$startImage=($arrRow['startFull']) ? '<img src="'.$GLOBALS['TL_CONFIG']['websitePath'].'/system/themes/'.$GLOBALS['TL_CONFIG']['backendTheme'].'/images/ok.gif" alt="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['yes'].'" title="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['yes'].'" class="tl_la_bookingcal_fullicon" />' : '<img src="'.$GLOBALS['TL_CONFIG']['websitePath'].'/system/themes/'.$GLOBALS['TL_CONFIG']['backendTheme'].'/images/delete_.gif" alt="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['no'].'" title="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['startFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['no'].'" class="tl_la_bookingcal_fullicon" />';
		
		/**
		 * Show Image according if the full day is used or not
		 */
		$endImage=($arrRow['endFull']) ? '<img src="'.$GLOBALS['TL_CONFIG']['websitePath'].'/system/themes/'.$GLOBALS['TL_CONFIG']['backendTheme'].'/images/ok.gif" alt="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['yes'].'" title="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['yes'].'" class="tl_la_bookingcal_fullicon" />' : '<img src="'.$GLOBALS['TL_CONFIG']['websitePath'].'/system/themes/'.$GLOBALS['TL_CONFIG']['backendTheme'].'/images/delete_.gif" alt="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['no'].'" title="'.$GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endFull'][0].' '.$GLOBALS['TL_LANG']['MSC']['no'].'" class="tl_la_bookingcal_fullicon" />';

	
		return '<div class="cte_type"><h1>'.$this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'],$arrRow['startDate']).$startImage.' - '.$this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'],$arrRow['endDate']).$endImage.'</h1></div>'."\n";
	}
	
	/**
	 * Check if dates are not colliding
	 */
	public function evalDateStart($startDate, DataContainer $dc)
	{
			$id=$dc->id;
			$objPid = $this->Database->prepare("SELECT pid FROM tl_la_bookingcal_dates WHERE id=?")
								->execute($id);
			$pid=$objPid->pid;
			
			// Query to check if date is within another range
			$objDates = $this->Database->prepare("SELECT id,startDate,endDate,startFull,endFull FROM tl_la_bookingcal_dates WHERE pid=? AND (startDate <= ? AND endDate >= ?) AND id !=?")
									   ->execute($pid,$startDate,$startDate,$id);
			
			if($objDates->numRows > 0)
			{
				//If new start date and previous end date are on the same day, check if none is full day
				if ($objDates->endDate == $startDate AND ($objDates->endFull OR $this->Input->post('startFull')))
					throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']));
					
				if ($objDates->endDate > $startDate)
					throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']));
			}
			return $startDate;
	}
		
	/**
	 * Check if dates are not colliding
	 */
	public function evalDateEnd($endDate, DataContainer $dc)
	{
			$id=$dc->id;
			$objPid = $this->Database->prepare("SELECT pid FROM tl_la_bookingcal_dates WHERE id=?")
								->execute($id);
			$pid=$objPid->pid;
			$this->import('Date');

			
			$objStartDate= new $this->Date($this->Input->post('startDate'));
			$startDate = $objStartDate->__get('timestamp');
			
			//Check if end date is after start date
			if ($startDate > $endDate)
				throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['endDatebefore']));
			
			// Query to check if date is within another range
			$objDates = $this->Database->prepare("SELECT id,startDate,endDate,startFull,endFull FROM tl_la_bookingcal_dates WHERE pid=? AND (startDate <= ? AND endDate >= ?) AND id !=?")
									   ->execute($pid,$endDate,$endDate,$id);
			
			if($objDates->numRows > 0)
			{
				//If new start date and previous end date are on the same day, check if none is full day
				if ($objDates->startDate == $endDate AND ($objDates->startFull OR $this->Input->post('endFull')))
					throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']));
					
				if ($objDates->startDate < $endDate)
					throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateCollision']));
			
			}
			
			// Query to check if there are dates within the range
			$objDates = $this->Database->prepare("SELECT id FROM tl_la_bookingcal_dates WHERE pid=? AND (startDate > ? AND endDate < ?) AND id !=?")
									   ->execute($pid,$startDate,$endDate,$id);
			if($objDates->numRows > 0)
			{
				throw new Exception(sprintf($GLOBALS['TL_LANG']['tl_la_bookingcal_dates']['dateWithinRange'], $objDates->numRows));
			}
			return $endDate;
	}

}


?>
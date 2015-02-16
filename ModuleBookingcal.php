<?php

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
 * Class bookingcal_output 
 *
 * @copyright  Aaron Lauterer 2009 
 * @author     Aaron Lauterer aaron@lauterer.at 
 * @package    Controller
 */
 
namespace Contao;
 
class ModuleBookingcal extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_la_bookingcal';
	
	/**
	 * Year
	 * @var array
	 */
    protected $arrayYear = array();          	

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
            $objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### '.$GLOBALS['TL_LANG']['FMD']['la_bookingcal'][0].' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}


		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
        $year=date('Y');
        $object = $this->la_bookingcal_object;
        
	    for($i=0;$i<=$this->la_bookingcal_years;$i++)
	    {    
            $objTemplate = new FrontendTemplate($this->la_bookingcal_template);	
    
            // Set timestamps to the beginning and end of the year
            $yearStart=mktime(0,0,0,1,1,$year);
            $yearEnd=mktime(0,0,0,12,31,$year);
            
            $objDates = $this->Database->prepare("SELECT id,startDate,endDate,startFull,endFull FROM tl_la_bookingcal_dates WHERE pid=? AND (endDate >=? AND startDate <= ?) ORDER BY endDate")
                             ->execute($object,$yearStart,$yearEnd);
            $objTemplate->year=$year;
            
            $this->arrayYear = $objDates->fetchAllAssoc();
            $objTemplate->months=$this->generateMonths($year);
            
            $strBookings .= $objTemplate->parse();
            $year++;
        }
        $this->Template->bookingcal = $strBookings;	
        
        // Get object name to include in the CSS classes
        $objName = $this->Database->prepare("SELECT name FROM tl_la_bookingcal_objects WHERE id=?")
                             ->execute($object);
        $this->Template->objectName = 'la_'.strtolower(str_replace(' ','-',$objName->fetchAllAssoc()[0]['name']));
        
	}
	
	/**
	 * Generate an array object for that year
	 */
    protected function generateMonths($year)
    {
        $months=array();
        
        for ($i=1;$i<=12;$i++)
        {
            for($s=1;$s<=date('t',mktime(0,0,0,$i,1,$year));$s++)
            {
                $months[$i][$s]['style']=$this->checkDayStatus(mktime(0,0,0,$i,$s,$year));
            }
        }  
    
        return $months;
    }
    
    /**
     * Check status of a given day
     */         
    protected function checkDayStatus($tstamp)
    {
        foreach ($this->arrayYear as $value)
        {
            // Day is start day and full day
            if($tstamp==$value['startDate'] AND $value['startFull']==1)
                return 'full';
            // Day is end day and full day
            if($tstamp==$value['endDate'] AND $value['endFull']==1)
                return 'full';
            // Day is either start or end day but not full
            if ($tstamp==$value['startDate'] OR $tstamp==$value['endDate'])
                return 'change';
            // Day is within Span
            if ($tstamp > $value['startDate'] AND $tstamp < $value['endDate'])
                return 'full';
        }
        return 'free'; 
    }

}
?>
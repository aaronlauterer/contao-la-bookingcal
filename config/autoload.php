<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'Contao\ModuleBookingcal' => 'system/modules/la_bookingcal/ModuleBookingcal.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_la_bookingcal'      => 'system/modules/la_bookingcal/templates',
	'la_bookingcal_standard' => 'system/modules/la_bookingcal/templates',
));

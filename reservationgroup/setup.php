<?php

/*
   ------------------------------------------------------------------------
   FPSoftware - Full consumables listing in User details
   Copyright (C) 2014 by Future Processing
   ------------------------------------------------------------------------

   LICENSE

   This file is part of FPFutures project.

   FPSoftware Plugin is free software: you can redistribute it and/or modify
   it under the terms of the GNU Affero General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   FPSoftware is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU Affero General Public License for more details.

   You should have received a copy of the GNU Affero General Public License
   along with FPSoftware. If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------

   @package   FPFutures
   @author    Future Processing
   @co-author
   @copyright Copyright (c) 2014 by Future Processing
   @license   AGPL License 3.0 or (at your option) any later version
              http://www.gnu.org/licenses/agpl-3.0-standalone.html
   @since     2014

   ------------------------------------------------------------------------
 */

function plugin_init_reservationgroup() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['reservationgroup'] = true;
}


/**
 * Definition of the plugin version and its compatibility with the version of core
 *
 * @return array
 */
function plugin_version_reservationgroup()
{
    return array(
        'name' => "reservationgroup",
        'version' => '1.0',
        'author' => 'Guillaume KOCH',
        'license' => 'GPLv2+',
        'homepage' => '',
        'minGlpiVersion' => '9.4'
    ); // For compatibility / no install in version < 0.80
}

/**
 * Blocking a specific version of GLPI.
 * GLPI constantly evolving in terms of functions of the heart, it is advisable
 * to create a plugin blocking the current version, quite to modify the function
 * to a later version of GLPI. In this example, the plugin will be operational
 * with the 0.84 and 0.85 versions of GLPI.
 *
 * @return boolean
 */
function plugin_reservationgroup_check()
{
    if (version_compare(GLPI_VERSION, '9.4', 'lt') || version_compare(GLPI_VERSION, '9.5', 'gt')) {
        echo "This plugin requires GLPI >= 9.4 and GLPI <= 9.5";

        return false;
    }

    return true;
}

/**
 * Control of the configuration
 *
 * @param boolean $verbose
 * @return boolean
 */



function plugin_reservationgroup_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo 'Installed / not configured';
   }
   return false;
}

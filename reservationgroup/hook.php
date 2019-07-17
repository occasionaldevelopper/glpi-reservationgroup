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

/**
 * It is in these functions that you need to put your SQL queries used for creating your specific tables.
 *
 * Here, you can now see your plugin in the list of plugins.
 *
 * @return boolean Needs to return true if success
 */

function plugin_reservationgroup_install() {
    global $DB;

        $query="ALTER TABLE `glpi_reservations` ADD `groups_id` INT NOT NULL AFTER `users_id`";

        $DB->queryOrDie($query, "ALTER TABLE `glpi_reservations` ADD `groups_id` INT NOT NULL AFTER `users_id`");

        $dirdoc=GLPI_ROOT . "/plugins/reservationgroup/docs/";
        $diroriginaux=GLPI_ROOT . "/plugins/reservationgroup/originaldocs/";

        $dir=array();
        $dir['inc']  = GLPI_ROOT . "/inc/";
        $dir['front'] =GLPI_ROOT . "/front/";

        $filescopy=array('group.class.php'=>'inc','reservation.class.php'=>'inc','reservationitem.class.php'=>'inc','reservation.form.php'=>'front');

        foreach ($filescopy as $filename => $folder) {

          //first, we make a copy of the original
          $theoriginalfile=$dir[$folder] . $filename;
          copy($theoriginalfile,$diroriginaux . $filename);

          //then we put the new one
          $thefile=$dirdoc . $filename;
          copy($thefile,$dir[$folder] . $filename);
        } //end of foreach filescopy

	return true;
}



/**
 * Because we've created a table, do not forget to destroy if the plugin is uninstalled.
 *
 * @return boolean Needs to return true if success
 */
function plugin_reservationgroup_uninstall() {
    global $DB;

    if ($DB->tableExists("glpi_reservations")) {
         $query = "ALTER TABLE glpi_reservations DROP groups_id";

         $DB->queryOrDie($query, "ALTER TABLE glpi_reservations DROP groups_id");

    }



        $dirdoc=GLPI_ROOT . "/plugins/reservationgroup/docs/";
        $diroriginaux=GLPI_ROOT . "/plugins/reservationgroup/originaldocs/";

        $dir=array();
        $dir['inc']  = GLPI_ROOT . "/inc/";
        $dir['front'] =GLPI_ROOT . "/front/";

        $filescopy=array('group.class.php'=>'inc','reservation.class.php'=>'inc','reservationitem.class.php'=>'inc','reservation.form.php'=>'front');

        foreach ($filescopy as $filename => $folder) {

          //first, we make a copy of the original
          $theoriginalfile=$diroriginaux . $filename;
          copy($theoriginalfile,$dir[$folder] . $filename);
        } //end of foreach filescopy

	return true;
}




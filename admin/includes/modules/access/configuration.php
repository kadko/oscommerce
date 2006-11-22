<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  Released under the GNU General Public License
*/

  class osC_Access_Configuration extends osC_Access {
    var $_module = 'configuration',
        $_group = 'configuration',
        $_icon = 'configure.png',
        $_title = ACCESS_CONFIGURATION_TITLE,
        $_sort_order = 200;

    function osC_Access_Configuration() {
      global $osC_Database;

      $this->_subgroups = array();

      $Qgroups = $osC_Database->query('select configuration_group_id, configuration_group_title from :table_configuration_group where visible = 1 order by sort_order, configuration_group_title');
      $Qgroups->bindTable(':table_configuration_group', TABLE_CONFIGURATION_GROUP);
      $Qgroups->execute();

      while ($Qgroups->next()) {
        $this->_subgroups[] = array('icon' => 'configure.png',
                                    'title' => $Qgroups->value('configuration_group_title'),
                                    'identifier' => 'gID=' . $Qgroups->valueInt('configuration_group_id'));
      }
    }
  }
?>
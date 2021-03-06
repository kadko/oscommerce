<?php
/**
 * osCommerce Online Merchant
 * 
 * @copyright Copyright (c) 2011 osCommerce; http://www.oscommerce.com
 * @license BSD License; http://www.oscommerce.com/bsdlicense.txt
 */

  namespace osCommerce\OM\Core\Site\Shop\Application\Account\Action;

  use osCommerce\OM\Core\ApplicationAbstract;
  use osCommerce\OM\Core\Registry;
  use osCommerce\OM\Core\OSCOM;

  class Create {
    public static function execute(ApplicationAbstract $application) {
      $OSCOM_Session = Registry::get('Session');
      $OSCOM_Service = Registry::get('Service');
      $OSCOM_Breadcrumb = Registry::get('Breadcrumb');
      $OSCOM_Template = Registry::get('Template');

// redirect the customer to a friendly cookies-must-be-enabled page if cookies
// are disabled (or the session has not started)
      if ( $OSCOM_Session->hasStarted() === false ) {
        OSCOM::redirect(OSCOM::getLink(null, 'Info', 'Cookies'));
      }

      $application->setPageTitle(OSCOM::getDef('create_account_heading'));
      $application->setPageContent('create.php');

      if ( $OSCOM_Service->isStarted('Breadcrumb') ) {
        $OSCOM_Breadcrumb->add(OSCOM::getDef('breadcrumb_create_account'), OSCOM::getLink(null, null, 'Create', 'SSL'));
      }

      $OSCOM_Template->addJavascriptPhpFilename(OSCOM::BASE_DIRECTORY . 'Core/Site/Shop/assets/form_check.js.php');
    }
  }
?>

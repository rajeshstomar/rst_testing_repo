<?php
namespace App\Messaging;

/**
 * Remit
 * Class to handle all Messaging for Remit Product
 * @author Vikram
 */
class Remit extends \App\Messaging 
{

    //private $_product;

    /**
     * MVC::__constructor
     * @param type $product
     */
    public function __construct($product='') {
        parent::__construct($product);
        self::setup($product);
    
    }

    /**
     * sendSMS
     * Method to sendSMS
     * @return boolean
     */
    public function sendSMS() {
        try {
            return $this->_sms->send();
        } catch (Exception $e ) {
            $this->_sms->setError($e->getMessage(),$e->getCode());
            return false;
        }        
                
    }
    
    /**
     * sendMail
     * Method to send mail
     * @return boolean
     */
    public function sendMail() {
        try {
            return $this->_mail->sendMail();
        } catch (\Exception $e ) {
            $this->_mail->setError($e->getMessage());
            return false;
        }
    }
  
}
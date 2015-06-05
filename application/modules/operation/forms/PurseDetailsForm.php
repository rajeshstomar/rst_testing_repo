<?php
/**
 * Form for editing master purse in the application
 *
 * @category backoffice
 * @package backoffice_forms
 * @copyright company
 */

class PurseDetailsForm extends App_Operation_Form
{
    /**
     * Overrides init() in Zend_Form
     * 
     * @access public
     * @return void
     */
    public function init() {
        // init the parent
        parent::init();
        
        // set the form's method
        $this->setMethod('post');
        
        
        $pname = new Zend_Form_Element_Text('name');
        $pname->setOptions(
            array(
                'label'      => 'Purse Name *',
                'required'   => TRUE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty' ,array('StringLength', false, array(4, 60)),
                                ),
                'maxlength' => '20',
            )
        );
        
        $this->addElement($pname);
        $pname->addValidator('Alpha', true, array('allowWhiteSpace' => true));
        $pname->setAttrib('readonly', true);
        
        $desc = new Zend_Form_Element_Text('description');
        $desc->setOptions(
            array(
                'label'      => 'Purse Description *',
                'required'   => TRUE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty' ,array('StringLength', false, array(4, 60)),
                                ),
                'maxlength' => '50',
            )
        );
        
        $this->addElement($desc);
        $desc->addValidator('Alpha', true, array('allowWhiteSpace' => true));
       
        $balance = new Zend_Form_Element_Text('max_balance');
        $balance->setOptions(
            array(
                'label'      => 'Max Balance',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($balance);
        
        $channel = new Zend_Form_Element_Select('load_channel');
        $channel->setOptions(
            array(
                'label'      => 'Load Channel *',
                'required'   => TRUE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    
                                ),
                'multiOptions' => Util::getLoadChannel(),
            )
        );
        $this->addElement($channel);
        
        $day = new Zend_Form_Element_Text('load_validity_day');
        $day->setOptions(
            array(
                'label'      => 'Load Validity Day',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '3',
            )
        );
        $this->addElement($day);
        
        $hour = new Zend_Form_Element_Text('load_validity_hr');
        $hour->setOptions(
            array(
                'label'      => 'Load Validity Hour',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '2',
            )
        );
        $this->addElement($hour);
        
        
        $min = new Zend_Form_Element_Text('load_validity_min');
        $min->setOptions(
            array(
                'label'      => 'Load Validity Minute',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '2',
            )
        );


         $this->addElement($min);
        
        
        $load_min = new Zend_Form_Element_Text('load_min');
        $load_min->setOptions(
            array(
                'label'      => 'Minimum Value per Load',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($load_min);
        
        $load_max = new Zend_Form_Element_Text('load_max');
        $load_max->setOptions(
            array(
                'label'      => 'Maximum Value per Load',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($load_max);
   
       	 	
        $name = new Zend_Form_Element_Text('load_max_cnt_daily');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Loads per Day',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
        $name = new Zend_Form_Element_Text('load_max_val_daily');
        $name->setOptions(
            array(
                'label'      => 'Max Load Amount per Day',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);
         
        $name = new Zend_Form_Element_Text('load_max_cnt_monthly');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Loads per Month',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
        $name = new Zend_Form_Element_Text('load_max_val_monthly');
        $name->setOptions(
            array(
                'label'      => 'Max Load Amount per Month',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);
     
        $name = new Zend_Form_Element_Text('load_max_cnt_yearly');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Loads per Year',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
        
        
       
        
        $name = new Zend_Form_Element_Text('load_max_val_yearly');
        $name->setOptions(
            array(
                'label'      => 'Max Load Amount per Year',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);

        $type = new Zend_Form_Element_Select('txn_restriction_type');
        $type->setOptions(
            array(
                'label'      => 'Restriction Type *',
                'required'   => TRUE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    
                                ),
                'multiOptions' => Util::getTxnRestrictionType(),
            )
        );
        $this->addElement($type);
        
       
        $upload = new Zend_Form_Element_Select('txn_upload_list');
        $upload->setOptions(
            array(
                'label'      => 'Upload List *',
                'required'   => TRUE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    
                                ),
                'multiOptions' => Util::getYesNo(),
            )
        );
        $this->addElement($upload);
         
        
        
        $min = new Zend_Form_Element_Text('txn_min');
        $min->setOptions(
            array(
                'label'      => 'Minimum Value of Txn',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($min);
        
        $max = new Zend_Form_Element_Text('txn_max');
        $max->setOptions(
            array(
                'label'      => 'Maximum Value of Txn',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($max);
   
 	
        $name = new Zend_Form_Element_Text('txn_max_cnt_daily');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Txns per Day',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
        $name = new Zend_Form_Element_Text('txn_max_val_daily');
        $name->setOptions(
            array(
                'label'      => 'Max Txn Amount per Day',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);
         
        $name = new Zend_Form_Element_Text('txn_max_cnt_monthly');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Txns per Month',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
         $name = new Zend_Form_Element_Text('txn_max_val_monthly');
        $name->setOptions(
            array(
                'label'      => 'Max Txn Amount per Month',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);
     
        $name = new Zend_Form_Element_Text('txn_max_cnt_yearly');
        $name->setOptions(
            array(
                'label'      => 'Max no. of Txns per Year',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '4',
            )
        );
        $this->addElement($name);
        
        
        
       
        
        $name = new Zend_Form_Element_Text('txn_max_val_yearly');
        $name->setOptions(
            array(
                'label'      => 'Max Txn Amount per Year',
                'required'   => FALSE,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                     'Digits',
                                ),
                 'maxlength' => '10',
                 'addRupeeSymbol' => true,
            )
        );
        $this->addElement($name);
        
         
//        $date = new Zend_Form_Element_Text('date_start');
//        $date->setOptions(
//            array(
//                'label'      => 'Date Start (Changes will be implimented from tomorrow)',
//                'required'   => TRUE,
//                'filters'    => array(
//                                    'StringTrim',
//                                    'StripTags',
//                                ),
//              
//                'maxlength' => '10',
//            )
//        );
//        $this->addElement($date);
//        $date->setAttrib('readonly', true);
//        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(
            array(
                'label'      => 'Save Purse',
                'required'   => TRUE,
                'title'       => 'Save Purse',
                'class'     => 'tangerine',
            )
        );
        $this->addElement($submit);
        
        $this->setElementDecorators(array(
                    'viewHelper',
                    'Errors',
                    array(array('data'=>'HtmlTag'),array('tag'=>'dd','class'=>'form-field-column edit')),
                    array('Label',array('tag'=>'dt','class'=>'form-name-column')),
                   
        ));
                
        $this->setDecorators(array(
            'FormElements',           
            array(array('Value'=>'HtmlTag'), array('tag'=>'dl','class'=>'innerbox form')),
            array('Description', array('placement' => 'prepend')),
            'Form'
        ));
        
    }
    
    
    
}
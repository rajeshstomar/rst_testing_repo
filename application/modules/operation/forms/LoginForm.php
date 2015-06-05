<?php
/**
 * User login form
 *
 * @category backoffice
 * @package backoffice_forms
 * @copyright company
 */

class LoginForm extends App_Operation_Form
{
    /**
     * This form does not have a cancel link
     * 
     * @var mixed
     * @access protected
     */
    protected $_cancelLink = false;
    
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
        
        $username = new Zend_Form_Element_Text('username');
        $username->setOptions(
            array(
                //'label'      => 'Username',
                'required'   => true,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty',
                                ),
                'class'     => 'input-bg1'
            )
        );
        $this->addElement($username);
        
        $password = new Zend_Form_Element_Password('password');
        $password->setOptions(
            array(
                
                //'label'      => 'Password',
                'required'   => true,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty',
                                ),
               'class'     => 'input-bg2'                
            )
        );
        $this->addElement($password);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(
            array(
                'ignore'   => true,
                'label'      => 'Log in →',
                //'required'   => true,
                'class'     => 'btn right1',
                'title'       => 'Log in →',
            )
        );
        $submit->removeDecorator('Label');
        $this->addElement($submit);
        
        
//          $this->setElementDecorators(array(
//                    'viewHelper',
//                    'Errors',
//                    array(array('data'=>'HtmlTag'),array('tag'=>'td')),
//                    array('Label',array('tag'=>'td')),
//                    array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
//        ));
//          
//          $this->setDecorators(array(
//                'FormElements',
//                array(array('data'=>'HtmlTag'),array('tag'=>'table')),
//                'Form'
//        ));
          
        /**
         * for new UI
         */
         $this->setElementDecorators(array(
                    'viewHelper',
                    'Errors',
                    //array(array('data'=>'HtmlTag'),array('tag'=>'div')),
                    //array('Label',array('tag'=>'div')),
                    array(array('row'=>'HtmlTag'),array('tag'=>'div', 'class' => 'inputbox'))
        ));
        $this->setDecorators(array(
            'FormElements',
           // array(array('Value'=>'HtmlTag'), array('tag'=>'div',)),
            //array('Description', array('placement' => 'prepend')),
            'Form'

        )); 
            
//        $this->setDecorators(array(
//            'FormElements',
//            array(array('Value'=>'HtmlTag'), array('tag'=>'div','class'=>'zend_form_custom')),
//            array('Description', array('placement' => 'prepend')),
//            'Form'
//
//        ));             
    }
}
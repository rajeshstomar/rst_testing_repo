<?php
/**
 * Neft Update Form
 *
 * @category backoffice
 * @package backoffice_forms
 * @copyright company
 */

class Remit_Ratnakar_ManualMappingUpdateForm extends App_Operation_Form
{
    /**
     * This form does not have a cancel link
     * 
     * @var mixed
     * @access protected
     */
//    protected $_cancelLink = false;
    
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
         $utr = new Zend_Form_Element_Text('utr');
         $utr->setOptions(
            array(
                'label'      => 'UTR *',
                'required'   => true,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty',array('StringLength', false, array(16, 16)),
                                ),
                 'maxlength' => '16',
            )
        );
        $this->addElement($utr);
        $remarks = new Zend_Form_Element_Text('manual_mapping_remarks');
        $remarks->setOptions(
            array(
                'label'      => 'Remarks *',
                'required'   => true,
                'filters'    => array(
                                    'StringTrim',
                                    'StripTags',
                                ),
                'validators' => array(
                                    'NotEmpty',array('StringLength', false, array(2, 250)),
                                ),
                 'maxlength' => '250',
            )
        );
        $this->addElement($remarks);
        
        
        $rrid = new Zend_Form_Element_Hidden('strReqId');
        $rrid->setOptions(
            array(
                'required' => true,
               
            )
        );
        $this->addElement($rrid);
        
        $rrid = new Zend_Form_Element_Hidden('batch_name');
        $rrid->setOptions(
            array(
                'required' => true,
               
            )
        );
        $this->addElement($rrid);
        
        $rrid = new Zend_Form_Element_Hidden('status');
        $rrid->setOptions(
            array(
                'required' => true,
               
            )
        );
        $this->addElement($rrid);
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(
            array(
                'label'      => 'Confirm',
                'required'   => FALSE,
                'title'       => 'Confirm',
                'class'     => 'tangerine',
            )
        );
        $this->addElement($submit);
        
        $this->setElementDecorators(array(
                    'viewHelper',
                    'Errors',
                    array(array('data'=>'HtmlTag'),array('tag'=>'dd','class'=>'form-field-column edit')),
                    array('Label',array('tag'=>'dt','class'=>'form-name-column')),
                    //array('Label',array('tag'=>'div')),
                   // array(array('row'=>'HtmlTag'),array('tag'=>'div','class'=>'formrow')),
        ));
                // We want to display a 'failed authentication' message if necessary;
        // we'll do that with the form 'description', so we need to add that
        // decorator.
        $this->setDecorators(array(
            'FormElements',
            //array('HtmlTag', array('tag' => 'div', 'class' => 'innerbox')),
            array(array('Value'=>'HtmlTag'), array('tag'=>'dl','class'=>'innerbox form')),
            array('Description', array('placement' => 'prepend')),
            'Form'
        ));
        
        
    }
}
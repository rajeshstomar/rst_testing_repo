<?php

class Remit_Ratnakar_TransactionsForm extends App_Operation_Form {

    public function init() {
        $this->_cancelLink = false;

        $this->addElement('text', 'mobile', array(
            'filters' => array('StringTrim'),
            'validators' => array('Digits', array('StringLength', false, array(10, 10)),),
            'required' => true,
            'label' => 'Mobile Number: * (+91)',
            'style' => 'width:200px;',
            'maxlength' => '10',
        ));

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setOptions(
                array(
                    'label' => 'Submit',
                    'required' => false,
                    'ignore' => true,
                    'title' => 'Submit',
                    'class' => 'tangerine'
                )
        );
        $this->addElement($submit);

        $this->setElementDecorators(array(
            'viewHelper',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'dd', 'class' => 'form-field-column edit')),
            array('Label', array('tag' => 'dt', 'class' => 'form-name-column')),
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('Value' => 'HtmlTag'), array('tag' => 'dl', 'class' => 'innerbox form')),
            array('Description', array('placement' => 'prepend')),
            'Form'
        ));
    }

}

?>
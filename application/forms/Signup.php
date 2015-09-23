<?php

class Application_Form_Signup extends Zend_Form
{

    /**
     * Registeration Form
     * @author Mohamed Ramadan
     */
    public function init()
    {
        // Setting Submission Method
        $this->setMethod('post');
       
        // User Id 
        $id = new Zend_Form_Element_Hidden('id');
       
        // User Name
        $name = new Zend_Form_Element_Text('name');
        $name->setRequired();
        $name->setLabel('Full Name: ');
        $name->setAttribs(array('class'=>'form-control', 
            'placeholder'=>'example: Mohamed Ramadan'));
      
        // User Company
        $company = new Zend_Form_Element_Select('company');
        $company->setRequired();
        $company->setLabel('Company: ');
        $company->setAttrib('class', 'form-control');
        // Should be dynamic 
        $company->addMultiOptions(array(
            '0'=>'--select--',
            '1'=>'HP',
            '2'=>'Vodafone',
            '3'=>'Huawei',
            '4'=>'ITI'));
        
        
        // User Mobile 
        $mobile = new Zend_Form_Element('mobile');
        $mobile->
            setRequired()->
            setLabel('Mobile: ')->
            addValidators(array('Digits',
                array(
                    'regex', false,
                    array(
                        'pattern'  => '/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
                        'messages' => 'This is not a mobile number!'))))->
            addFilter('StringTrim')->
            setAttribs(array(
                'class' => 'form-control',
                'placeholder' => 'Enter User Mobile #'
        ));
        
        // User PickPoint
        $pickPoint = new Zend_Form_Element_Textarea('pickPoint');
        $pickPoint->setRequired();
        $pickPoint->setLabel('Pick Point: ');
        $pickPoint->setAttrib('class', 'form-control');
        $pickPoint->setAttrib('rows', '3');
        
        // Submit Button Element
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->
            setAttribs(array(
                'class' => 'btn btn-success',
                'value' => 'Submit!'
        ));


        // Reset Button Element
        $reset = new Zend_Form_Element_Reset("reset");
        $reset->
            setAttribs(array(
                'class' => 'btn btn-danger',
                'value' => 'Reset!'
        ));
        
        //Add Form Elements 
        $this->addElements(array($id, $name, $company, $mobile, $pickPoint, $submit, $reset));
        
    }


}


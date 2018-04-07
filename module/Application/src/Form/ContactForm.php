<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class ContactForm extends Form
{

    public function __construct($name = 'contact')
    {
        parent::__construct($name);
        $this->setAttribute('method', 'post');
        $this->setInputFilter($this->getFilters());
        $this->add([
            'name' => 'cookie',
            'attributes' => [
                'type' => 'hidden'
            ]
        ]);
        $this->add([
            'name' => 'name',
            'attributes' => [
                'type' => 'text',
                'placeholder' => 'Nome'
            ],
            'options' => [
                'label' => 'Nome'
            ]
        ]);
        $this->add([
            'name' => 'email',
            'attributes' => [
                'type' => 'text',
                'placeholder' => 'E-Mail'
            ],
            'options' => [
                'label' => 'E-Mail'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Enviar',
                'id' => 'submitbutton',
                'class' => 'btn btn-default'
            ]
        ]);
    }

    public function getFilters()
    {
        $inputFilter = new InputFilter();
        
        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StripTags'
                ],
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress'
                ]
            ]
        ]);
        
        $inputFilter->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StripTags'
                ],
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1
                    ]
                ]
            ]
        ]);
        
        return $inputFilter;
    }
}
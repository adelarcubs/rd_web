<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm;

class ContactController extends AbstractActionController
{

    public function indexAction()
    {
        $form = new ContactForm();
        
        $request = $this->getRequest();
        $form->get('cookie')->setValue($request->getCookie('adelarTrack', null));
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $form->setData($data);
            if ($form->isValid()) {

            }
        }
        
        return new ViewModel([
            'form' => $form
        ]);
    }
}

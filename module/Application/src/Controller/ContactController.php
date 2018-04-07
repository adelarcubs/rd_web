<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm;
use Application\Service\TrackService;

class ContactController extends AbstractActionController
{

    private $trackService;

    public function __construct(TrackService $trackService)
    {
        $this->trackService = $trackService;
    }

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
                $this->trackService->sendRegistration($data['name'], $data['email'], $data['cookie']);
            }
        }
        
        return new ViewModel([
            'form' => $form
        ]);
    }
}

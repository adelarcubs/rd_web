<?php
namespace Application\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Application\Controller\ContactController;
use Application\Service\TrackService;

class ContactControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $trackService = $container->get(TrackService::class);
        
        return new ContactController($trackService);
    }
}
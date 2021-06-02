<?php

namespace App\Listener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class LoginListener implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $manager,
        private FlashBagInterface $flash
    )
    {}

    public static function getSubscribedEvents()
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onLoginSuccess'
        ];
    }
    
    /**
     * onLoginSuccess
     * Ajout la date de dernière connexion d'un utilisateur et un message de bienvenue
     *
     * @param  InteractiveLoginEvent $event
     * @return void
     */
    public function onLoginSuccess(InteractiveLoginEvent $event)
    {
        /** @var User*/
        $user = $event->getAuthenticationToken()->getUser();
        $user->setLoginAt(new \DateTime());
        $this->flash->add('success', 'Bienvenue '.$user->getUsername());
        $this->manager->flush();
    }
}
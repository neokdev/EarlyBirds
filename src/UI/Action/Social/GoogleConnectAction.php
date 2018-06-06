<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 12:17
 */

namespace App\UI\Action\Social;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GoogleConnectAction
 *
 * Link to this controller to start the "connect" process
 *
 * @Route(
 *     "/connect/google",
 *     name="social_google"
 * )
 */
class GoogleConnectAction
{
    /**
     * @var ClientRegistry
     */
    private $registry;

    /**
     * GoogleConnectAction constructor.
     * @param ClientRegistry $registry
     */
    public function __construct(
        ClientRegistry $registry
    ) {
        $this->registry = $registry;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke()
    {
        return $this->registry
            ->getClient('google')// key used in oauth2-client.yaml
            ->redirect();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 12:19
 */

namespace App\UI\Action\Social;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GoogleCheckAction
 * @Route(
 *     "/connect/google/check",
 *     name="social_google_check"
 * )
 */
class GoogleCheckAction
{
    /**
     * @var ClientRegistry
     */
    private $registry;

    /**
     * GoogleConnectAction constructor.
     *
     * After going to Google, you're redirected back here
     * because this is the "redirect_route" you configured
     * in oauth2-client.yaml
     *
     * @param ClientRegistry $registry
     */
    public function __construct(
        ClientRegistry $registry
    ) {
        $this->registry = $registry;
    }

    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
//        // ** if you want to *authenticate* the user, then
//        // leave this method blank and create a Guard authenticator
//
//        /** @var GoogleClient $client */
//        $client = $this->registry
//            ->getClient('google');
//
//        try {
//            // the exact class depends on which provider you're using
//            /** @var GoogleUser $user */
//            $user = $client->fetchUser();
//
//            $user->getFirstName();
//        } catch (IdentityProviderException $e) {
//            dump($e->getMessage());
//            die();
//        }
    }
}

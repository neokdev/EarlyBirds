<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 11:40
 */

namespace App\UI\Action\Social;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FacebookConnectAction
 *
 * Link to this controller to start the "connect" process
 *
 * @Route(
 *     "/connect/facebook",
 *     name="social_facebook"
 * )
 */
class FacebookConnectAction
{
    /**
     * @var ClientRegistry
     */
    private $registry;

    /**
     * FacebookConnectAction constructor.
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

//        $fb = new Facebook([
//            'app_id'                => '2006731669578578',
//            'app_secret'            => '833af3e2e52b6fe69ff4fb64569db65e',
//            'default_graph_version' => 'v3.0',
//        ]);
//
//        $helper = $fb->getRedirectLoginHelper();
//
//
//        $permissions = ['email']; // Optional permissions
//        $loginUrl    = $helper->getLoginUrl('http://127.0.0.1:8000/connect/facebook/check', $permissions);
//
//        echo '<a href="'.$loginUrl.'">Log in with Facebook!</a>';

        return $this->registry
            ->getClient('facebook')// key used in oauth2-client.yaml
            ->redirect();

//        return new RedirectResponse($loginUrl);
    }
}

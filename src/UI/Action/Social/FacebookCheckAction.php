<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 13/05/2018
 * Time: 11:55
 */

namespace App\UI\Action\Social;

use App\UI\Action\Social\Interfaces\FacebookCheckActionInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\FacebookUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FacebookCheckAction
 * @Route(
 *     "/connect/facebook/check",
 *     name="social_facebook_check"
 * )
 */
class FacebookCheckAction implements FacebookCheckActionInterface
{
    /**
     * @var ClientRegistry
     */
    private $registry;

    /**
     * FacebookConnectAction constructor.
     *
     * After going to Facebook, you're redirected back here
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
     *
     * @return mixed|void
     */
    public function __invoke(Request $request)
    {
//        // ** if you want to *authenticate* the user, then
//        // leave this method blank and create a Guard authenticator
//
//        /** @var FacebookClient $client */
//        $client = $this->registry
//            ->getClient('facebook');
//
//        try {
//            // the exact class depends on which provider you're using
//            /** @var FacebookUser $user */
//            $user = $client->fetchUser();
//
//            $user->getFirstName();
//        } catch (IdentityProviderException $e) {
//            dump($e->getMessage());
//            die();
//        }
//
//        dump($user);die();

//        $fb = new Facebook([
//            'app_id'                => '2006731669578578',
//            'app_secret'            => '833af3e2e52b6fe69ff4fb64569db65e',
//            'default_graph_version' => 'v3.0',
//        ]);
//
//        $helper = $fb->getRedirectLoginHelper();
//
//        try {
//            $accessToken = $helper->getAccessToken();
//        } catch (FacebookResponseException $e) {
//            // When Graph returns an error
//            echo 'Graph returned an error: '.$e->getMessage();
//            exit;
//        } catch (FacebookSDKException $e) {
//            // When validation fails or other local issues
//            echo 'Facebook SDK returned an error: '.$e->getMessage();
//            exit;
//        }
//
//        if (! isset($accessToken)) {
//            if ($helper->getError()) {
//                header('HTTP/1.0 401 Unauthorized');
//                echo "Error: ".$helper->getError()."\n";
//                echo "Error Code: ".$helper->getErrorCode()."\n";
//                echo "Error Reason: ".$helper->getErrorReason()."\n";
//                echo "Error Description: ".$helper->getErrorDescription()."\n";
//            } else {
//                header('HTTP/1.0 400 Bad Request');
//                echo 'Bad request';
//            }
//            exit;
//        }
//
//        // Logged in
//        echo '<h3>Access Token</h3>';
//        dump($accessToken->getValue());
//
//        // The OAuth 2.0 client handler helps us manage access tokens
//        $oAuth2Client = $fb->getOAuth2Client();
//
//        // Get the access token metadata from /debug_token
//        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//        echo '<h3>Metadata</h3>';
//        dump($tokenMetadata);
//
//        // Validation (these will throw FacebookSDKException's when they fail)
//        $tokenMetadata->validateAppId($config['app_id']);
//        // If you know the user ID this access token belongs to, you can validate it here
//        //$tokenMetadata->validateUserId('123');
//        $tokenMetadata->validateExpiration();
//
//        if (! $accessToken->isLongLived()) {
//            // Exchanges a short-lived access token for a long-lived one
//            try {
//                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
//            } catch (FacebookSDKExceptionn $e) {
//                echo "<p>Error getting long-lived access token: ".$e->getMessage()."</p>\n\n";
//                exit;
//            }
//
//            echo '<h3>Long-lived</h3>';
//            dump($accessToken->getValue());
//        }
//
//        $_SESSION['fb_access_token'] = (string) $accessToken;
//
//        // User is logged in with a long-lived access token.
//        // You can redirect them to a members-only page.
//        //header('Location: https://example.com/members.php');
//
//        try {
//            // Returns a `Facebook\FacebookResponse` object
//            $response = $fb->get('/me?fields=id,name', $accessToken);
//        } catch (FacebookResponseException $e) {
//            echo 'Graph returned an error: '.$e->getMessage();
//            exit;
//        } catch (FacebookSDKException $e) {
//            echo 'Facebook SDK returned an error: '.$e->getMessage();
//            exit;
//        }
//
//        $user = $response->getGraphUser();
//
////        echo 'Name: ' . $user['name'];
////         OR
//         dump($user->getName());die();
    }
}

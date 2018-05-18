<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 17/05/2018
 * Time: 22:25
 */

namespace App\Services;

use App\Domain\Models\User;
use Swift_Mailer;
use Swift_Message;
use Twig\Environment;

/**
 * Class Mailer
 */
class Mailer
{
    /**
     * Mail address of the sender
     */
    const ADMIN_EMAIL = 'admin@earlybirds.com';
    /**
     * @var Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $environment;

    /**
     * Mailer constructor.
     * @param Swift_Mailer $mailer
     * @param Environment  $environment
     */
    public function __construct(
        Swift_Mailer $mailer,
        Environment $environment
    ) {
        $this->mailer      = $mailer;
        $this->environment = $environment;
    }

    /**
     * @param User   $user
     * @param string $subject
     * @param string $receiver
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function sendMailToUser(User $user, string $subject, string $receiver = self::ADMIN_EMAIL)
    {
        $message = new Swift_Message($subject);

        $message
            ->setFrom(self::ADMIN_EMAIL)
            ->setTo($receiver)
            ->setBody(
                $this->environment->render(
                    "Emails/registerConfirm.html.twig",
                    [
                        'data' => $user,
                    ]
                ),
                'text/html'
            );
        $this->mailer->send($message);
    }
}

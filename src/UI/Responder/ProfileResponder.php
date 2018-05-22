<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 10/05/2018
 * Time: 07:40
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ProfileResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProfileResponder implements ProfileResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * ProfileResponder constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    final public function __invoke()
    {
        return new Response(
            $this->environment->render('profile.html.twig')
        );
    }
}

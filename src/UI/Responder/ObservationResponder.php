<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 06/05/2018
 * Time: 00:39
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ObservationResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ObservationResponder implements ObservationResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * ObservationResponder constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return mixed|Response
     */
    public function __invoke()
    {
        return new Response(
            $this->environment->render('obsvervation.html.twig')
        );
    }
}

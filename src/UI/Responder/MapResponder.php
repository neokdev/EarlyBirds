<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 16/06/2018
 * Time: 21:15
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\MapResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class MapResponder
 * @package App\UI\Responder
 */
class MapResponder implements MapResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * MapResponder constructor.
     * --------------------------
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     * ----------------------------
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        return new Response(
            $this->twig->render('map.html.twig')
        );
    }
}

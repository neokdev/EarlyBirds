<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 15/06/2018
 * Time: 14:02
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\LastObservesResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class LastObservesResponder implements LastObservesResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * LastObservesResponder constructor.
     * @param Environment $environment
     */
    public function __construct(
        Environment $environment
    ) {
        $this->environment = $environment;
    }

    /**
     * @param array $observes
     *
     * @return string
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(array $observes)
    {
        return new Response($this->environment->render("lastObserves.html.twig",
            [
                'observes' => $observes,
                ])
        );
    }
}

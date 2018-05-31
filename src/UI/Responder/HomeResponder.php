<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 05/05/2018
 * Time: 18:01
 */

namespace App\UI\Responder;

use App\Domain\Repository\TaxRefRepository;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class HomeResponder implements HomeResponderInterface
{
    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var TaxRefRepository
     */
    private $taxRefRepository;

    /**
     * HomeResponder constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment, TaxRefRepository $taxRefRepository)
    {
        $this->environment = $environment;
        $this->taxRefRepository = $taxRefRepository;
    }

    /**
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        dump($this->taxRefRepository->findOneBy(['id' => rand(1, 3983)]));

        return new Response(
            $this->environment->render('homepage.html.twig')
        );
    }
}

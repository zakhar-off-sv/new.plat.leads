<?php

declare(strict_types=1);

namespace App\Controller;

use App\Sandbox\Auction\AuctionFactoryInterface;
use App\Sandbox\FilterManager\FilterManagerFactory;
use App\Sandbox\HttpAuthInterface;
use App\Sandbox\LeadManagerInterface;
use App\Sandbox\LeadRepositoryInterface;
use App\Sandbox\RequestConverterInterface;
use App\Sandbox\ValidationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Receiving lead.
 *
 * @Route("/lead")
 */
class SandboxController extends AbstractController
{
    private $auth;
    private $requestConverter;
    private $filterManager;
    private $validation;
    private $leadManager;
    private $leadRepository;
    private $auction;

    public function __construct(
        HttpAuthInterface $auth,
        RequestConverterInterface $requestConverter,
        FilterManagerFactory $filterManagerFactory,
        ValidationInterface $validation,
        LeadManagerInterface $leadManager,
        LeadRepositoryInterface $leadRepository,
        AuctionFactoryInterface $auctionFactory
    )
    {
        $this->auth = $auth;
        $this->requestConverter = $requestConverter;
        $this->filterManager = $filterManagerFactory->getFilterManager();
        $this->validation = $validation;
        $this->leadManager = $leadManager;
        $this->leadRepository = $leadRepository;
        $this->auction = $auctionFactory->getAuction();
    }

    /**
     * @Route("/import", name="lead.import")
     *
     * @param Request $request
     * @return Response
     */
    public function import(Request $request): Response
    {
        if (!$this->auth->isAuth($request)) {
            return $this->json([], 403);
        }

        $command = $this->requestConverter->convert($request);

        $command = $this->filterManager->process($command);

        if (!$this->validation->validate($command)) {
            return $this->json([], 400);
        }

        if (!$this->auction->run($command)) {
            $lead = $this->leadManager->build($command);
            $this->leadRepository->add($lead);
        }

        //$this->flusher->flush();

        return $this->json([], 200);
    }
}

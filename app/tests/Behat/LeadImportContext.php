<?php

declare(strict_types=1);

namespace App\Tests\Behat;

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

final class LeadImportContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /** @var Response|null */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When i send a request to :path
     */
    public function iSendARequestTo(string $path): void
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then i should get a response with the status :code
     */
    public function theIShouldGetAResponseWithTheStatus(int $code): void
    {
        if ($this->response->getStatusCode() !== $code) {
            throw new \RuntimeException('Response code does not match');
        }
    }
}

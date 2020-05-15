<?php

namespace Lib\PDFBundle\PDFWrapper;

use Lib\PDFBundle\Exceptions\PDFException;
use Http\Client\Exception\NetworkException;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollectionInterface;
use TheCodingMachine\Gotenberg\Client;
use TheCodingMachine\Gotenberg\ClientException;
use TheCodingMachine\Gotenberg\Document;
use TheCodingMachine\Gotenberg\DocumentFactory;
use TheCodingMachine\Gotenberg\GotenbergRequestInterface;
use TheCodingMachine\Gotenberg\HTMLRequest;
use TheCodingMachine\Gotenberg\RequestException;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PDFWrapper
{

    /** @var = HttpFoundationFactory */
    private $httpFoundationFactory;

    /** @var string */
    private $serviceUrl;

    /** @var Environment */
    private $templating;

    /** @var EntrypointLookupCollectionInterface */
    private $entrypointLookup;

    /**
     * PDFWrapper constructor.
     * @param string $serviceUrl
     * @param Environment $templating
     * @param EntrypointLookupCollectionInterface $entrypointLookup
     */
    public function __construct(string $serviceUrl = 'http://localhost:3000',
                                Environment $templating,
                                EntrypointLookupCollectionInterface $entrypointLookup)
    {
        $this->httpFoundationFactory = new HttpFoundationFactory();
        $this->serviceUrl = $serviceUrl;
        $this->templating = $templating;
        $this->entrypointLookup = $entrypointLookup;
    }

    /**
     * @param APDFConfig $config
     * @param array $args
     * @return Response
     */
    public function generateFromConfig(APDFConfig $config, array $args = []): Response
    {
        try {
            $request = $this->generateRequest($config, $args);
            return $this->generateHttpResponse($request, $config->getName());
        } catch (RequestException $e) {
            throw new PDFException(500, 'problem in request', $e);
        } catch (\Safe\Exceptions\FilesystemException $e) {
            throw new PDFException(500, 'problem in FilesystemException', $e);
        } catch (ClientException $e) {
            throw new PDFException(500, 'problem in client', $e);
        } catch (NetworkException $e) {
            throw new PDFException(500, 'problem in pdf server', $e);
        } catch (\Exception $e) {
            throw new PDFException(500, 'problem in other', $e);
        }
    }

    /**
     * @param APDFConfig $config
     * @param array $args
     * @return GotenbergRequestInterface
     * @throws RequestException
     * @throws \Safe\Exceptions\FilesystemException
     */
    private function generateRequest(APDFConfig $config, array $args = []): GotenbergRequestInterface
    {
        # HTML conversion example.
        $csss = $this->generateCssArray($config->getListCss());
        $header = $this->generateHtml('header', $config->getHeaderPath(), $args['header'] ?? []);
        $body = $this->generateHtml('body', $config->getBodyPath(), ($args['body'] ?? []) + ['title' => $config->getName(), 'csss' => array_keys($csss)]);
        $footer = $this->generateHtml('footer', $config->getFooterPath(), $args['footer'] ?? []);
        $assets = $csss + $this->generateImgArray($config->getListImg());
        $request = new HTMLRequest($body);
        $request->setHeader($header);
        $request->setFooter($footer);
        $request->setAssets($assets);
        $request->setPaperSize($config->getPaperSize());
        $request->setMargins($config->getMargins());
        return $request;
    }

    /**
     * @param GotenbergRequestInterface $request
     * @param string $pdfName
     * @return Response
     * @throws ClientException
     */
    private function generateHttpResponse(GotenbergRequestInterface $request, string $pdfName): Response
    {
        $client = new Client($this->serviceUrl, new \Http\Adapter\Guzzle6\Client());
        $response = $client->post($request);
        $response = $response->withHeader('Content-Disposition', 'attachment; filename="' . $pdfName . '.pdf"');

        return $this->httpFoundationFactory->createResponse($response);
    }

    /**
     * @param string $name
     * @param string $path
     * @param array $args
     * @return Document
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws \Safe\Exceptions\FilesystemException
     */
    private function generateHtml(string $name, string $path, array $args = []): ?Document
    {
            if (!empty($path)) {
                $html = $this->templating->render($path, $args);
                return DocumentFactory::makeFromString($name, $html);
            }
            return null;
    }

    /**
     * @param array $listCss
     * @return Document[]
     */
    private function generateCssArray($listCss = []): array
    {
        $assets = [];
        foreach ($listCss as $key => $value) {
            foreach ($this->entrypointLookup->getEntrypointLookup("_default")->getCssFiles($value) as $ke2 => $cssFile) {
                $assets[$ke2 . '.' . $key] = DocumentFactory::makeFromPath($ke2 . '.' . $key, str_replace('/build/', 'build/', $cssFile));
            }
        }
        return $assets;
    }

    /**
     * @param array $listAssetsPath
     * @return Document[]
     */
    private function generateImgArray($listAssetsPath = []): array
    {
        return array_map(function ($key, $value) {
            return DocumentFactory::makeFromPath($key, $value);
        }, array_keys($listAssetsPath), $listAssetsPath);
    }
}

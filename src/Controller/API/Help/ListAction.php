<?php

namespace App\Controller\API\Help;

use App\Entity\Help;
use App\Repository\HelpRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Utils\JsonSerializerWrapper;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Version("v1")
 * @SWG\Tag(name="Helps", description="All Help routes")
 *
 */
class ListAction extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/helps", name="helps_list")
     *
     * @QueryParam(name="subject", nullable=true)
     * @QueryParam(name="page", nullable=true)
     *
     * @SWG\Response(
     *     response=200,
     *     description="Success",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Help::class, groups={"getHelp"}))
     *     )
     * )
     * @param JsonSerializerWrapper $jsonSerializerWrapper
     * @param HelpRepository $helpRepository
     * @param ParamFetcher $paramFetcher
     * @return Response
     */
    public function __invoke(JsonSerializerWrapper $jsonSerializerWrapper,
                             HelpRepository $helpRepository,
                             ParamFetcher $paramFetcher): Response
    {

        $subject = $paramFetcher->get('subject');
        $page = $paramFetcher->get('page');
        $helps = $helpRepository->findBySubjectOrPage($subject, $page);
        $jsonEtitles = $jsonSerializerWrapper->serialize($helps, [], ['getHelp']);
        return new Response($jsonEtitles, JsonResponse::HTTP_OK);
    }
}

<?php
namespace App\Controller;
use App\Repository\PetRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class PetController
{
    private $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'];
        $type = $data['type'];
        $photoUrls = $data['photoUrls'];

        if (empty($name) || empty($type)) {
            throw new NotFoundHttpException('Hay parametros obligatorios');
        }

        $this->petRepository->savePet($name, $type, $photoUrls);

        return new JsonResponse(['status' => 'Mascota creada'], Response::HTTP_CREATED);
    }

    public function get($id): JsonResponse
    {
        $pet = $this->petRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $pet->getId(),
            'name' => $pet->getName(),
            'type' => $pet->getType(),
            'photoUrls' => $pet->getPhotoUrls(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function getAll(): JsonResponse
    {
        $pets = $this->petRepository->findAll();
        $data = [];

        foreach ($pets as $pet) {
            $data[] = [
                'id' => $pet->getId(),
                'name' => $pet->getName(),
                'type' => $pet->getType(),
                'photoUrls' => $pet->getPhotoUrls(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}

?>
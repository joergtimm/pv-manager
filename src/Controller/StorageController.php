<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Storage;
use App\Form\StorageType;
use App\Repository\StorageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Turbo\TurboBundle;

#[Route('/storage')]
class StorageController extends AbstractController
{
    #[Route('/', name: 'app_storage_index', methods: ['GET'])]
    public function index(StorageRepository $storageRepository): Response
    {
        return $this->render('storage/_storelist.html.twig', [
            'items' => $storageRepository->findAll(),
        ]);
    }

    #[Route('/by/{id}', name: 'app_storage_by_project', methods: ['GET'])]
    public function indexByProject(Project $project, StorageRepository $storageRepository): Response
    {
        return $this->render('storage/_storelist.html.twig', [
            'items' => $storageRepository->findBy(['project' => $project], ['position' => 'ASC']),
            'project' => $project
        ]);
    }

    #[Route('/new/inplace/{id}', name: 'app_storage_new_inplace', methods: ['GET', 'POST'])]
    public function newInplace(Project $project, Request $request, StorageRepository $storageRepository): Response
    {

        $storage = new Storage();
        $form = $this->createForm(StorageType::class, $storage, [
            'action' => $this->generateUrl('app_storage_new_inplace', [ 'id' => $project->getId()])
        ]);
        $emptyForm = clone $form;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $storage->setProject($project);
            $storageRepository->save($storage, true);

            $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
            return $this->render('storage/add.stream.html.twig', [
                'item' => $storage,
                'form' => $emptyForm->createView(),
            ]);
        }

        return $this->render('storage/_form.html.twig', [
            'storage' => $storage,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_storage_show', methods: ['GET'])]
    public function show(Storage $storage): Response
    {
        return $this->render('storage/show.html.twig', [
            'storage' => $storage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_storage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Storage $storage, StorageRepository $storageRepository): Response
    {
        $form = $this->createForm(StorageType::class, $storage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $storageRepository->save($storage, true);

            return $this->redirectToRoute('app_storage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('storage/edit.html.twig', [
            'storage' => $storage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_storage_delete', methods: ['POST'])]
    public function delete(Request $request, Storage $storage, StorageRepository $storageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$storage->getId(), $request->request->get('_token'))) {
            $storageRepository->remove($storage, true);
        }

        return $this->redirectToRoute('app_storage_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @throws \JsonException
     */
    #[Route(path: '/do_sort/{id}', name: 'admin_sort_storages', methods: ['POST', 'PATCH'])]
    public function sortAjax( Project $project, Request $request, EntityManagerInterface $em, StorageRepository $storageRepository): RedirectResponse
    {
        $orderedIds = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        if ($orderedIds === null) {
            return $this->redirectToRoute('app_project_show', [
                'id' => $project->getId()
            ]);
        }

        $storages = $storageRepository->findBy(['project' => $project], ['position' => 'ASC']);
        $orderedIds = array_flip($orderedIds);

        foreach ($storages as $storage) {
            $storage->setPosition($orderedIds[$storage->getId()]);
        }
        $em->flush();
        return $this->redirectToRoute('app_project_show', [
            'id' => $project->getId()
        ]);
    }
}

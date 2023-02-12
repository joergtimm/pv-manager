<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use App\Service\UploaderHelper;
use League\Flysystem\FilesystemException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/project')]
class ProjectController extends AbstractController
{
    #[Route('/', name: 'app_project_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @throws FilesystemException
     */
    #[Route('/new', name: 'app_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProjectRepository $projectRepository, UploaderHelper $helper): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['thumb']->getData();
            $project->setCreateAt(new \DateTimeImmutable('now'));

            if ($uploadedFile) {
                $filename = $helper->uploadProjektThumblImage($uploadedFile);
                $project->setThumb($filename);
            }

            $projectRepository->save($project, true);

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('project/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->save($project, true);

            return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('project/edit.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_project_delete', methods: ['POST'])]
    public function delete(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $projectRepository->remove($project, true);
        }

        return $this->redirectToRoute('app_project_index', [], Response::HTTP_SEE_OTHER);
    }
}

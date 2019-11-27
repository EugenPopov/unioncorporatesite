<?php


namespace App\Controller\Admin;


use App\DataMapper\CategoryMapper;
use App\DataMapper\FileMapper;
use App\Entity\Category;
use App\Entity\File;
use App\Form\CategoryType;
use App\Form\FileType;
use App\Model\CategoryModel;
use App\Model\FileModel;
use App\Services\FileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends AbstractController
{

    /**
     * @var CategoryMapper
     */
    private $mapper;
    /**
     * @var FileService
     */
    private $fileService;

    public function __construct(FileService $fileService, FileMapper $mapper)
    {
        $this->mapper = $mapper;
        $this->fileService = $fileService;
    }

    public function index()
    {
        $files = $this->fileService->all();

        return $this->render('admin/file/index.html.twig', [
            'files' => $files,
        ]);
    }

    public function create(Request $request): Response
    {
        $model = new FileModel();

        $form = $this->createForm(FileType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->fileService->create($data, new File());

            return $this->redirectToRoute('admin_file_index');
        }

        return $this->render('admin/file/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(File $file, Request $request): Response
    {
        $model = $this->mapper->entityToModel($file);

        $form = $this->createForm(FileType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->fileService->update($data, $file);

            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/file/update.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function delete(File $file)
    {
        $this->fileService->delete($file);

        return $this->redirectToRoute('admin_file_index');
    }

}
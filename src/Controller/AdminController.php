<?php
namespace App\Controller;

use App\Entity\ArticleBlog;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleBlogRepository;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function displayAdmin()
    {

        return $this->render('admin/adminIndex.html.twig');
    }
}
?>
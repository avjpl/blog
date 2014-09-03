<?php
namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
//use Blogger\BlogBundle\Entity\Enquiry;
//use Blogger\BlogBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * List all blog entries
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BloggerBlogBundle:Blog')
                        ->getLatestBlogs();

        return $this->render('BloggerBlogBundle:Blog:index.html.twig', array(
            'articles' => $articles
        ));
    }

    public function taggedPostAction($tag = null, $limit = null)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BloggerBlogBundle:Blog')
                    ->getBlogsByTagName($tag, $limit);

        return $this->render('BloggerBlogBundle:Blog:index.html.twig', array(
            'articles' => $articles
        ));
    }

    /**
     * Show single blog post
     */
    public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find blog post ' . $id);
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                        ->getCommentsForBlog($blog->getId());


        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog' => $blog,
            'comments' => $comments
        ));
    }

    public function sidebarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('BloggerBlogBundle:Blog')->getTags();

        $tagWeights = $em->getRepository('BloggerBlogBundle:Blog')->getTagWeights($tags);

        $commentsLimit = $this->container->getParameter('blogger_blog.comments.latest_comment_limit');

        $latestComments = $em->getRepository('BloggerBlogBundle:Comment')
                            ->getLatestComments($commentsLimit);

        return $this->render('BloggerBlogBundle:Blog:sidebar.html.twig', array(
            'latestComments'    => $latestComments,
            'tags'              => $tagWeights
        ));
    }

//    public function contactAction(Request $request)
//    {
//        $enquiry = new Enquiry();
//        $form = $this->createForm(new EnquiryType(), $enquiry);
//
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//
//            return $this->redirect($this->generateUrl('BloggerBlog_contact'));
//        }
//
//        return $this->render('BloggerBlogBundle:Blog:contact.html.twig', array(
//            'form' => $form->createView()
//        ));
//    }
}
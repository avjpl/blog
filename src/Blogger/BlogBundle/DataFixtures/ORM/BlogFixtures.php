<?php
namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setTitle('A day with Symfony2');
        $blog1->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $blog1->setImage('1.jpg');
        $blog1->setThumbnail('1.jpg');
        $blog1->setAuthor('dsyph3r');
        $blog1->setCategory('PHP');
        $blog1->setTags('symfony2, php, paradise, symblog');
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setTitle('The pool on the roof must have a leak');
        $blog2->setContent('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        $blog2->setImage('1.jpg');
        $blog2->setThumbnail('1.jpg');
        $blog2->setAuthor('Zero Cool');
        $blog2->setCategory('Photography');
        $blog2->setTags('pool, leaky, hacked, movie, hacking, symblog');
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        $blog3->setContent('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog3->setImage('1.jpg');
        $blog3->setThumbnail('1.jpg');
        $blog3->setAuthor('Gabriel');
        $blog3->setCategory('CSS');
        $blog3->setTags('misdirection, magic, movie, hacking, symblog');
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('The grid - A digital frontier');
        $blog4->setContent('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $blog4->setImage('1.jpg');
        $blog4->setThumbnail('1.jpg');
        $blog4->setAuthor('Kevin Flynn');
        $blog4->setCategory('Database');
        $blog4->setTags('grid, daftpunk, movie, symblog');
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('You\'re either a one or a zero. Alive or dead');
        $blog5->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog5->setImage('1.jpg');
        $blog5->setThumbnail('1.jpg');
        $blog5->setAuthor('Gary Winston');
        $blog5->setCategory('HTML5');
        $blog5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        $manager->persist($blog5);

        $manager->flush();

        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
    }

    public function getOrder()
    {
        return 1;
    }
}
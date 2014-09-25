<?php
namespace Blogger\BlogBundle\Twig\Extensions;

class Gravatar extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('gravatar', array($this, 'getGravatar')),
        );
    }

    public function getGravatar($email, $size = 78, $default = '')
    {
        if(! $this->checkEmail($email) && iseet($default)) {
            $default = "http://www.gravatar.com/avatar?s=" . $size ;
        }

        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) .
                "?d=" . urlencode($default) .
                "?s=" . $size;
    }

    /**
     * @param $email
     * @return object
     */
    private function checkEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getName()
    {
        return 'blogger_twig_gravatar';
    }
}
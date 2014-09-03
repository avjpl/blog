<?php
namespace Blogger\BlogBundle\Twig\Extensions;

class TwigTruncate extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('trunc', array($this, 'truncate')),
        );
    }

    /**
     * Truncate text
     *
     * @param $str
     * @param int $cnt
     * @param string $end
     * @return string
     */
    public function truncate($str, $cnt = 3, $hellip = ' ...')
    {
        $times = $pos = 0;

        do {
            $pos = stripos($str, '.', $pos);
            $pos = $pos + 1;
            $times = $times + 1;
        } while($times < $cnt);

        return substr($str, 0, stripos($str, '.', $pos)) . $hellip;
    }

    public function getName()
    {
        return 'blogger_twig_truncate';
    }
}
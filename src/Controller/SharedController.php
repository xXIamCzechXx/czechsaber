<?php

namespace App\Controller;

use App\Service\Translator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

require_once('Config/config.php'); // Editor constants

abstract class SharedController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @param EntityManagerInterface $em
     * @param Translator $translator
     *
     * This constructor says, what dependencies are available through all controllers
     */
    public function __construct(EntityManagerInterface $em, Translator $translator) {
        $this->em = $em;
        $this->translator = $translator;
    }

    /**
     * @param $string
     * @return bool
     */
    public function hasNumber($string): bool
    {
        return (bool)preg_match('@[0-9]@', $string);
    }

    /**
     * @param $string
     * @return bool
     */
    public function hasUpperCase($string): bool
    {
        return (bool)preg_match('@[A-Z]@', $string);
    }

    /**
     * @param $string
     * @return bool
     */
    public function hasLowerCase($string): bool
    {
        return (bool)preg_match('@[a-z]@', $string);
    }

    /**
     * @param $string
     * @return bool
     */
    public function hasSpecialChars($string): bool
    {
        return (bool)preg_match('@[^\w]@', $string);
    }
}

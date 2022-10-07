<?php

namespace App\Controller\Config;
use App\Form\CookieFormType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="cookie_agreement_trait")
 */
trait CookieAgreementTrait
{
    public function cookieAgreement()
    {
        return new Response('Its coming from here .', 200, array('Content-Type' => 'text/html'));
    }

    public function handleCookieRequest($form, $request)
    {
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (true === $data['agreeMarketingTerms']) {
                setcookie('cookie-confirmation', 1, time() + (86400 * 30), "/"); // 86400 = 1 day
            } else {
                setcookie('cookie-confirmation', 0, time() + (86400), "/"); // 86400 = 1 day
            }

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["cookie-confirmation"] = 1;
        }
    }

    public function createCookieForm()
    {
        return $this->createForm(CookieFormType::class);
    }

    /**
     * Returns cookie form depending on cookies enabled
     * @author Dominik Mach
     * @return FormInterface|null
     */
    public function getCookieForm($request = null)
    {
        $form = null;

        if (!$this->isCookieClicked()) {
            if($form = $this->createCookieForm()){
                $this->handleCookieRequest($form, $request);
            }
        }
        return $form;
    }

    /**
     * Returns true/false depending on user cookie agreement
     * @author Dominik Mach
     * @return bool
     */
    public function isCookieEnabled()
    {
        if ((isset($_COOKIE['cookie-confirmation']) && $_COOKIE['cookie-confirmation'] == 1)/* || isset($_SESSION['cookie-confirmation'])*/) {
            return true;
        }
        return false;
    }

    /**
     * Returns true/false depending on user clicked cookie tab so it can dissapear
     * @author Dominik Mach
     * @return bool
     */
    public function isCookieClicked()
    {
        if ((isset($_COOKIE['cookie-confirmation']))/* || isset($_SESSION['cookie-confirmation'])*/) {
            return true;
        }
        return false;
    }
}
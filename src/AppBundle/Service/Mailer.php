<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 03/06/18
 * Time: 14:00
 */

namespace AppBundle\Service;


class Mailer
{
    protected $mailer;

    protected $templating;

    private $from = 'reservations@flyaround.com';

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendMail($to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();

        $mail
            ->setFrom($this->from)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }

    public function sendNotification($to)
    {
        $subject = 'Une nouvelle réservation sur votre vol Flyaround';
        $template = 'email/notification.html.twig';
        $body = $this->templating->render($template);
        $this->sendMail($to, $subject, $body);
    }

    public function sendConfirmation($to)
    {
        $subject = 'Confirmation de votre réservation Flyaround';
        $template = 'email/confirmation.html.twig';
        $body = $this->templating->render($template);
        $this->sendMail($to, $subject, $body);
    }
}
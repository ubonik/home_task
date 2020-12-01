<?php


namespace App\Service;


use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class Mailer
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendWelcomeMail(User $user)
    {
        $this->send('email/welcome.html.twig', 'Добро пожаловать на Spill-Coffee-On-The-Keyboard', $user);
    }

    public function sendWeeklyNewsletter(User $user, array $articles)
    {
        $this->send(
            'email/newsletter.html.twig',
            'Еженедельная рассылка статей Cat-Cas-Car',
            $user,
            function (TemplatedEmail $email) use ($articles) {
                $email
                    ->context([
                        'articles' => $articles
                    ])
                    ->attach('Опубликовано статей на сайте' . count($articles), 'report_' . date('Y-m-d') . '.txt');
            }
        );

    }

    private function send(string $template, string $subject, User $user, \Closure $callback = null)
    {
        $email = (new TemplatedEmail())
            ->from(new Address('noreply@symfony.skillbox', 'Spill-Coffee-On-The-Keyboard'))
            ->to(new Address($user->getEmail()))
            ->subject($subject)
            ->htmlTemplate($template);

        if ($callback) {
            $callback($email);
        }

        $this->mailer->send($email);
    }

}
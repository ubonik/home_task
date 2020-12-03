<?php


namespace App\Service;


use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class Mailer
{
    const WELCOME = "Добро пожаловать на Spill-Coffee-On-The-Keyboard";
    /**
     * @var MailerInterface
     */
    private $mailer;
    /**
     * @var ParameterBagInterface
     */
    private $parameterBag;

    public function __construct(MailerInterface $mailer, ParameterBagInterface $parameterBag)
    {
        $this->mailer = $mailer;
        $this->parameterBag = $parameterBag;
    }

    public function sendWelcomeMail(User $user)
    {
        $this->send('email/welcome.html.twig', self::WELCOME, $user);
    }

    public function sendWeeklyNewsletter(User $user, array $articles)
    {
        $this->send(
            'email/newsletter.html.twig',
            'Еженедельная рассылка статей ' . $this->parameterBag->get('app.site_name'),
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
            ->from(new Address($this->parameterBag->get('app.email_newsletter'), $this->parameterBag->get('app.site_name')))
            ->to(new Address($user->getEmail()))
            ->subject($subject)
            ->htmlTemplate($template);

        if ($callback) {
            $callback($email);
        }

        $this->mailer->send($email);
        sleep(1);
    }

}
<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Название статьи',
                'help' => 'Не используйте в названии слово "собака"'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Описание статьи',
                'attr' => ['rows' => 3]
            ])
            ->add('body', TextareaType::class, [
                'label' => 'Содержимое статьи',
                'attr' => ['rows' => 10]
            ])
            ->add('publishedAt', null, [
                'widget' => 'single_text',
                'label' => 'Дата публикации статьи'

            ])
            ->add('keyWords', TextType::class, [
                'label' => 'Ключевые слова статьи'
            ])
            ->add('author', EntityType::class, [
                'class' => User::class,
                'label' => 'Автор статьи',
                'choice_label' => function (User $user) {
                    return sprintf('%s (id: %d)', $user->getFirstName(), $user->getId());
                },
                'placeholder' => 'Выберите автора статьи',
                'choices' => $this->userRepository->findAllSortedByName()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

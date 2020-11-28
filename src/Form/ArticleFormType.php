<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotNull;


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
        /**
         * @var Article|null $article
         */
        $article = $options['data'] ?? null;

        $cannotEditAuthor = $article && $article->getId() && $article->isPublished();

        $imageConstraints = [
            new Image([
                'maxSize' => '2M',
                'minHeight' => 300,
                'minWidth' => 480,
                'allowPortrait' => false
            ])
        ];
        if (!$article || !$article->getImageFilename()){

            $imageConstraints[] = new NotNull([
                'message' => 'Не выбрано изображение статьи'
            ]);

        }

        $builder
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => $imageConstraints,
            ])
            ->add('title', TextType::class, [
                'label' => 'Название статьи',
                'help' => 'Не используйте в названии цифры',
                'required' => false
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Описание статьи',
                'attr' => ['rows' => 3],
                'required' => false
            ])
            ->add('body', TextareaType::class, [
                'label' => 'Содержимое статьи',
                'attr' => ['rows' => 10],
                'required' => false
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
                'choices' => $this->userRepository->findAllSortedByName(),
                'required' => false,
                'disabled' => $cannotEditAuthor
            ])
        ;

        if($options['enable_published_at']) {
            $builder->
            add('publishedAt', null, [
                'widget' => 'single_text',
                'label' => 'Дата публикации статьи'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'enable_published_at' => false
        ]);
    }
}

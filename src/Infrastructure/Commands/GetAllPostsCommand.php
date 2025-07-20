<?php

declare(strict_types=1);

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Commands;

use DDDHydration\Application\GetAllPostsService;
use DDDHydration\Infrastructure\Domain\Presenters\StdClassPostPresenter;
use DDDHydration\Infrastructure\Domain\Repositories\InMemoryPostRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetAllPostsCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('posts:all')
            ->setDescription('Show all posts')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $service = new GetAllPostsService(new InMemoryPostRepository());
        $posts = $service->handle(new StdClassPostPresenter());

        foreach ($posts as $post) {
            $output->writeln(strtoupper($post->title));
            $output->writeln('-------------');
            $output->writeln('> Comments:');

            foreach ($post->comments as $comment) {
                $output->writeln($comment->content);
                $output->writeln('By: ' . $comment->author);
                $output->writeln('');
            }

            if (empty($post->comments)) {
                $output->writeln('No comments available');
                $output->writeln('');
            }

            $output->writeln('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
            $output->writeln('');
        }

        return Command::SUCCESS;
    }
}

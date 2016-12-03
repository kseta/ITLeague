<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SearchPlayerCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:search-player')
            ->setDescription('Search player.')
            ->setHelp("This command search players.")
            ->addArgument('player-id', InputArgument::REQUIRED, "The target player's id.")
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Search Player');

        $playerIds = array_unique(explode(',', $input->getArgument('player-id')));

        $container = $this->getContainer();
        $criteriaBuilder = $container->get('domain.criteria_builder.search_player');
        $criteriaBuilder->setPlayerIds($playerIds);
        $criteria = $criteriaBuilder->build();
        $players = $this->getContainer()->get('domain.usecase.query.search_player')->run($criteria);

        if (empty($players)) {
            var_dump($input->getArgument('player-id'));
            $io->error(sprintf('Not find players by ids: %s.', $input->getArguments('player-id')));
            return;
        }

        $io->section('Result');
        $headers = ['id', 'number', 'name'];
        foreach ($players as $player) {
            $rows[] = [$player->getId(), $player->getDisplayNumber(), $player->getName()];
        }
        $io->table($headers, $rows);

        $io->success('Success.');
    }
}
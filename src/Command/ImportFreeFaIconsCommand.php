<?php

namespace App\Command;

use App\Entity\IconList;
use App\Repository\IconListRepository;
use App\Repository\IconsRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-free-fa-icons',
    description: 'Add a short description for your command',
)]
class ImportFreeFaIconsCommand extends Command
{
    public function __construct(private Filesystem $filesystem, private IconsRepository $iconsRepository, private IconListRepository $iconListRepository, private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function configure(): void
    {

    }

    /**
     * @throws FilesystemException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $text = $this->filesystem->read('fas.txt');
        $icons = $this->iconsRepository->findOneBy(['id' => 1]);
        $reader = Reader::createFromString($text);
        foreach ($reader as $record)
        {
            foreach ($record as $rows) {
                if (null != $rows || $rows != '')
                {
                    $iconlist = new IconList();
                    $iconlist
                        ->setIcon($icons)
                        ->setClass($rows);
                    $this->em->persist($iconlist);
                    $this->em->flush();
                }
            }

        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}

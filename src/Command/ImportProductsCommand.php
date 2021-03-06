<?php

namespace App\Command;

use App\Entity\Product;
use App\Utils\ExportImport\AbastractImportEntityHelper;
use App\Utils\ExportImport\ImportHelpers\ProductImportHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportProductsCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:import:products';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var AbastractImportEntityHelper
     */
    private $helper;

    public function __construct(ProductImportHelper $helper, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->helper = $helper;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Exports products to specifically named file')
            ->addArgument('path', InputArgument::REQUIRED, 'path of file to import');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('path');

        $this->helper->configureImport($filePath, Product::class);
        $this->helper->importData();


        $io->success(
            sprintf('Products successfully imported from %s', $filePath)
        );
    }
}

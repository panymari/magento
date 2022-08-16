<?php

namespace Codilar\NewCommand\Console;

use Symfony\Component\Console\Helper\ProgressBar;
use Magento\Framework\App\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Demo extends Command
{
    protected function configure()
    {
        $this->setName('product:count')
            ->setDescription('Get all products count');
        $options = [
            new InputOption('name', 'N', InputOption::VALUE_OPTIONAL, 'Greeter\'s name', "Steve")
        ];
        $this->setDefinition($options);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {


        $objectManager = ObjectManager::getInstance();
        $productCollectionFactory = $objectManager->get('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $products = $productCollectionFactory->create()->addAttributeToSelect('name');
        $productsCount = $products->count();

        $progressBar = new ProgressBar($output, $productsCount);
        for ($i=0; $i < $productsCount; $i++) {
            $progressBar->advance(1);
            sleep(1);
        }
        $progressBar->finish();

        $output->writeln("\nProducts lists:");

        foreach ($products as $product) {
            $output->writeln(sprintf( '%s', '- ' . $product->getName()));
        }
        $output->writeln(sprintf( '<info>You have %s products</info>', $productsCount));
    }
}

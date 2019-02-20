<?php
/**
 * Created by PhpStorm.
 * User: ssise
 * Date: 19/02/2019
 * Time: 23:00
 */

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'app:import-xml';

    /**
     * ImportCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setDescription('Import orders from api.')
            ->setHelp('Importing orders...');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $orderModel = $this->getContainer()->get('order_model');
        $orderModel->processImport();
    }
}
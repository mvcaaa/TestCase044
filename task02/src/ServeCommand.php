<?php
/**
 * Created by Astashov Andrey <mvc.aaa@gmail.com>
 * Date: 11.02.2016 / 8:55
 */

namespace mvcaaa\phpdevtask02;

require __DIR__ . '/BallCoords.php';

use Ratchet\App;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ServeCommand extends Command
{
	protected function configure()
	{
		$this
			->setName('serve')
			->setDescription('Simple sockets server app')
			->addArgument(
				'host',
				InputArgument::OPTIONAL,
				'Hostname to serve',
				'localhost'
			)
			->addArgument(
				'port',
				InputArgument::OPTIONAL,
				'Port to listen',
				8080
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$app = new App($input->getArgument('host'), $input->getArgument('port'));
		$app->route("/ball", new BallCoords());
		$app->run();
	}
}
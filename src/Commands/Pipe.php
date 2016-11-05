<?php
/**
 * SwiftOtter_Base is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * SwiftOtter_Base is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with SwiftOtter_Base. If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Joseph Maxwell
 * @copyright SwiftOtter Studios, 10/28/16
 * @package default
 **/

namespace Driver\Commands;

use Driver\Pipes\Master as PipeMaster;
use Driver\Pipes\Master;
use Driver\Pipes\Transport\Factory as TransportFactory;
use Driver\Pipes\Transport\TransportInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Pipe extends Command implements CommandInterface
{
    /** @var TransportFactory $transportFactory */
    private $transportFactory;

    public function __construct(Master $pipeMaster, TransportFactory $transportFactory)
    {
        $this->transportFactory = $transportFactory;
        parent::__construct(null);
    }

    protected function configure()
    {
        $this->setName('Run Pipe')
            ->setDescription('Executes the pipe set specified in the -p (--pipe-set) parameter.')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('pipe-set', 'p', InputOption::VALUE_REQUIRED)
                ])
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }

    public function go(TransportInterface $transport)
    {
        throw new \Exception('The Pipe command cannot be included in a pipe. It is the mother of all pipes.');
    }
}
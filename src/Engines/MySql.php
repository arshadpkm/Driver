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
 * @copyright SwiftOtter Studios, 11/19/16
 * @package default
 **/

namespace Driver\Engines;

use Driver\Commands\CommandInterface;
use Driver\Pipes\Transport\Status;
use Driver\Pipes\Transport\TransportInterface;
use Driver\Engines\MySql\Configuration;
use Symfony\Component\Console\Command\Command;

class MySql extends Command implements CommandInterface
{
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
        parent::__construct(null);
    }

    protected function configure()
    {
        $this->setName('Connect to MySql')
            ->setDescription('Connects to MySQL.');
    }

    public function go(TransportInterface $transport)
    {
        $value = $this->configuration->getConnection()->getAttribute(\PDO::ATTR_CONNECTION_STATUS);
        return $transport->withStatus(new Status('connection', 'success'));
    }
}
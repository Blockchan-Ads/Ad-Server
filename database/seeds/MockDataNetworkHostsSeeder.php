<?php
/**
 * Copyright (c) 2021 Blockchain-Ads Co. Ltd
 *
 * This file is part of AdServer
 *
 * AdServer is free software: you can redistribute and/or modify it
 * under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AdServer is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AdServer. If not, see <https://www.gnu.org/licenses/>
 */

use Blockchain-Ads\Adserver\Models\NetworkHost;
use Blockchain-Ads\Common\Domain\ValueObject\AccountId;
use Blockchain-Ads\Common\Domain\ValueObject\Email;
use Blockchain-Ads\Common\Domain\ValueObject\Url;
use Blockchain-Ads\Supply\Application\Dto\Info;
use Blockchain-Ads\Supply\Application\Dto\InfoStatistics;
use Illuminate\Database\Seeder;

class MockDataNetworkHostsSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('[mock] seeding: network_hosts');

        $info = new Info(
            'adserver',
            'ADSERVER DEMAND',
            '0.1',
            new Url('http://webserver'),
            new Url('http://localhost:4200'),
            new Url('http://webserver/policies/privacy.html'),
            new Url('http://webserver/policies/terms.html'),
            new Url('http://webserver/Blockchain-Ads/inventory/list'),
            new AccountId('0001-00000004-DBEB'),
            new Email('mail@example.com'),
            ['PUB', 'ADV'],
            'public'
        );

        $info->setDemandFee(0.01);
        $info->setSupplyFee(0.01);
        $info->setStatistics(new InfoStatistics(1, 1, 1));

        NetworkHost::registerHost($info->getAdsAddress(), $info, new DateTime());
    }
}

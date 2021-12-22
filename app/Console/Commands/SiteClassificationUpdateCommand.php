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

declare(strict_types=1);

namespace Blockchain-Ads\Adserver\Console\Commands;

use Blockchain-Ads\Adserver\Models\Site;
use Blockchain-Ads\Adserver\Services\Supply\SiteFilteringUpdater;

class SiteClassificationUpdateCommand extends BaseCommand
{
    protected $signature = 'ops:supply:site-classification:update';

    protected $description = 'Updates all sites internal classification';

    public function handle(): void
    {
        if (!$this->lock()) {
            $this->info('Command ' . $this->signature . ' already running');

            return;
        }

        $this->info('Start command ' . $this->signature);

        $siteClassificationUpdater = new SiteFilteringUpdater();
        foreach (Site::all() as $site) {
            $siteClassificationUpdater->addClassificationToFiltering($site);
        }

        $this->info('Finish command ' . $this->signature);
    }
}

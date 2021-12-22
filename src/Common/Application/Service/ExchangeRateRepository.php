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

namespace Blockchain-Ads\Common\Application\Service;

use Blockchain-Ads\Common\Application\Dto\ExchangeRate;
use Blockchain-Ads\Common\Application\Service\Exception\ExchangeRateNotAvailableException;
use DateTime;

interface ExchangeRateRepository
{
    /**
     * @param DateTime $dateTime
     * @param string $currency
     *
     * @return ExchangeRate
     *
     * @throws ExchangeRateNotAvailableException
     */
    public function fetchExchangeRate(DateTime $dateTime = null, string $currency = 'USD'): ExchangeRate;
}

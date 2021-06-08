<?php
declare(strict_types=1);

/*
 * Created by netlogix GmbH & Co. KG
 *
 * @copyright netlogix GmbH & Co. KG
 */

namespace nlxSessionOptimizer\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Console\Application;
use Shopware\Kernel;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

class Cronjob implements SubscriberInterface
{
    /** @var Kernel */
    private $kernel;

    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }

    public static function getSubscribedEvents()
    {
        return [
            'Shopware_CronJob_nlxClearExpiredSessions' => 'onClearExpiredSessions',
        ];
    }

    public function onClearExpiredSessions(\Shopware_Components_Cron_CronJob $cronJob): void
    {
        $command = new Application($this->kernel);
        $command->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'sw:session:cleanup',
        ]);
        $command->run($input, new NullOutput());
    }
}

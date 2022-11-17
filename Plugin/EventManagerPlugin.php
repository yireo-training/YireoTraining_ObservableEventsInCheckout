<?php declare(strict_types=1);

namespace YireoTraining\ObservableEventsInCheckout\Plugin;

use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface;

class EventManagerPlugin
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * EventManagerPlugin constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @param EventManager $subject
     * @param string $eventName
     * @param array $data
     * @return array
     */
    public function beforeDispatch(EventManager $subject, string $eventName, array $data = []): array
    {
        $log = false;
        if (stristr($eventName, 'order') || stristr($eventName, 'quote') || stristr($eventName, 'checkout')) {
            $log = true;
        }

        if ($log) {
            $this->logger->notice('ObservableEventsInCheckout: Possible event ' . $eventName);
        }

        return [$eventName, $data];
    }
}

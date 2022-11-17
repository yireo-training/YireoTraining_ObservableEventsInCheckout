<?php declare(strict_types=1);

namespace YireoTraining\ObservableEventsInCheckout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class GenericObserver implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SalesQuoteSaveBefore constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->logger->notice('ObservableEventsInCheckout: Listening to ' . $observer->getEvent()->getName());
    }
}

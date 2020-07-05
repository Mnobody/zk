<?php

declare(strict_types=1);

namespace App\Cycle;

use Cycle\ORM\Heap\Node;
use Cycle\ORM\Heap\State;
use Cycle\ORM\Mapper\Mapper;
use Cycle\ORM\Command\ContextCarrierInterface;

class TimestampMapper extends Mapper
{
    /**
     * @param object|EntityTimestampInterface $entity
     * @param Node $node
     * @param State $state
     * @return ContextCarrierInterface
     */
    public function queueCreate($entity, Node $node, State $state): ContextCarrierInterface
    {
        $time = time();

        $entity->setCreatedAt($time);
        $entity->setUpdatedAt($time);

        return parent::queueCreate($entity, $node, $state);
    }

    /**
     * @param object|EntityTimestampInterface $entity
     * @param Node $node
     * @param State $state
     * @return ContextCarrierInterface
     */
    public function queueUpdate($entity, Node $node, State $state): ContextCarrierInterface
    {
        $time = time();

        $entity->setUpdatedAt($time);

        return parent::queueUpdate($entity, $node, $state);
    }
}

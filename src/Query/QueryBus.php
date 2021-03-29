<?php
declare(strict_types=1);

namespace XBus\Query;

use InvalidArgumentException;
use XBus\BusChain;
use XBus\Message;

class QueryBus extends BusChain
{
    /**
     * @param  Message|Query $message
     * @return mixed
     */
    public function dispatch(Message $message)
    {
        if (! $message instanceof Query) {
            throw new InvalidArgumentException(
                sprintf("[QueryBus] Expected object (%s). Got (%s).", Query::class, get_class($message))
            );
        }

        return parent::dispatch($message);
    }
}

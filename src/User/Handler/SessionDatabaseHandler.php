<?php

declare(strict_types=1);

namespace Lyrasoft\Luna\User\Handler;

use Windwalker\Core\DateTime\Chronos;
use Windwalker\Core\Runtime\Config;
use Windwalker\DI\Attributes\Inject;
use Windwalker\Session\Handler\DatabaseHandler;

use function Windwalker\chronos;

/**
 * The SessionDatabaseHandler class.
 */
class SessionDatabaseHandler extends DatabaseHandler
{
    #[Inject]
    protected Config $config;

    /**
     * @inheritDoc
     */
    public function gc($lifetime): int|false
    {
        // Determine the timestamp threshold with which to purge old sessions.
        $past = time() - $lifetime;

        $count = 0;

        $this->db->delete($this->getOption('table'))
            ->where($this->getOption('columns')['time'], '<', $past)
            ->where('remember', '=', 0)
            ->execute();

        $count += $this->db->getWriter()->countAffected();

        // Remember
        $expires = $this->config->getDeep('user.remember_expires') ?: '+100days';
        $now = chronos();
        $seconds = Chronos::intervalToSeconds($now->modify($expires)->diff($now, true));
        $past = $now->format('U') - $seconds;

        $this->db->delete($this->getOption('table'))
            ->where($this->getOption('columns')['time'], '<', $past)
            ->where('remember', '=', 1)
            ->execute();

        return $count + $this->db->getWriter()->countAffected();
    }
}

<?php

namespace Base;

/**
 * Interface Base\ControllerInterface
 */
interface ControllerInterface
{
    /**
     * @param array $request
     * @return mixed|void
     * @throws \Exception
     */
    public function action(array $request);
}

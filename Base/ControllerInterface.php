<?php

namespace Base;

/**
 * Interface Base\ControllerInterface
 */
interface ControllerInterface
{
    /**
     * @param array $request
     * @return mixed
     */
    public function action(array $request);
}

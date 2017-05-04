<?php

namespace MyAppsSdk\Context;

class Collection
{
    const STATUS = 'status';


    protected $items = [];

    const NAME_DELIMITER = '.';

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    protected function getItems()
    {
        return $this->items;
    }


    private function nameSplit($name)
    {
        return explode(self::NAME_DELIMITER, $name);
    }

    protected function getField($name, $default = null)
    {
        $items = $this->items;
        foreach ($this->nameSplit($name) as $key) {
            if (!isset($items[$key])) {
                return $default;
            }
            $items = $items[$key];
        }

        return $items;
    }

    public function getRaw()
    {
        return $this->getItems();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 5/29/15
 * Time: 5:46 PM
 */

class Batch {

    protected $callback;

    protected $defaultCategory;
    public $batchSize;
    public $commitCount = 0;
    protected $data = [];

    public function __construct(Closure $callback, $batchSize = 5000, $defaultCategory = 'default') {
        $this->callback = $callback;
        $this->batchSize = $batchSize;
        $this->defaultCategory = $defaultCategory;
    }


    public function add($elements, $category = null) {
        if (!empty($elements) && is_scalar(reset($elements))) {
            $elements = [$elements];
        }
        if (!isset($category)) {
            $category = $this->defaultCategory;
        }
        foreach($elements as $element) {
            $this->data[$category][] = ($element instanceof \CActiveRecord) ? $element->attributes : $element;


            if (count($this->data[$category]) > $this->batchSize) {
                $this->commitCategory($category);
            }


        }
    }

    public function commitCategory($category) {

        $callback = $this->callback;
        $callback($this->data[$category], $category);
        $this->commitCount++;
        unset($this->data[$category]);
    }
    public function commit() {
        foreach($this->data as $key => $items) {
            $this->commitCategory($key);
        }
    }
    public function __destruct() {
        $this->commit();
    }
}
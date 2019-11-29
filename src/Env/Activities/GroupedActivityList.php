<?php

    namespace Ataccama\Eye\Client\Env\Activities;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Common\Utils\Comparator\IComparator;
    use Ataccama\Common\Utils\Comparator\Sorter;


    /**
     * Class GroupedActivityList
     * @package Ataccama\Eye\Env\Activities
     */
    class GroupedActivityList extends BaseArray
    {
        /**
         * @param Activity $activity
         */
        public function add($activity)
        {
            $groupId = $activity->dtCreated->format("Ymd") . sprintf('%03d', $activity->type->id);

            if (!isset($this->items[$groupId])) {
                $this->items[$groupId] = new ActivityList();
            }

            $this->items[$groupId]->add($activity);
        }

        /**
         * @return ActivityList
         */
        public function current(): ActivityList
        {
            return parent::current();
        }

        /**
         * @param ActivityList $activityList
         * @return GroupedActivityList
         */
        public static function create(ActivityList $activityList): GroupedActivityList
        {
            $activities = new GroupedActivityList();
            foreach ($activityList as $activity) {
                $activities->add($activity);
            }

            return $activities;
        }

        /**
         * @param bool             $type
         * @param IComparator|null $comparator
         * @return $this|BaseArray|bool
         */
        public function sort(bool $type = Sorter::ASC, IComparator $comparator = null)
        {
            $indexes = array_keys($this->items);
            if ($type) {
                sort($indexes, SORT_NUMERIC);
            } else {
                rsort($indexes, SORT_NUMERIC);
            }
            $items = [];
            foreach ($indexes as $index) {
                $items[] = $this->items[$index];
            }
            $this->items = $items;

            return $this;
        }
    }
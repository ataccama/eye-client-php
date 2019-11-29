<?php

    namespace Ataccama\Eye\Client\Env\Activities;
    
    use Ataccama\Common\Env\BaseArray;
    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class ActivityList
     * @package Ataccama\Eye\Env\Activities
     * @property-read GroupedActivityList $grouped
     * @property-read DateTime            $dtFirst
     * @property-read DateTime            $dtLast
     */
    class ActivityList extends BaseArray
    {
        use SmartObject;

        /**
         * @param Activity $activity
         * @return ActivityList
         */
        public function add($activity)
        {
            return parent::add($activity);
        }

        /**
         * @return Activity
         */
        public function current()
        {
            return parent::current();
        }

        /**
         * @return GroupedActivityList
         */
        public function getGrouped(): GroupedActivityList
        {
            return GroupedActivityList::create($this);
        }

        /**
         * @param ActivityList $activityList
         * @return ActivityList
         */
        public function insert($activityList): ActivityList
        {
            foreach ($activityList as $activity) {
                $this->add($activity);
            }

            return $this;
        }

        public function toApiArray(): array
        {
            $activities = [];
            foreach ($this as $activity) {
                $activities[] = $activity->toArray();
            }

            return $activities;
        }

        /**
         * @return DateTime
         */
        public function getDtFirst(): DateTime
        {
            if (count($this) > 0) {
                $dtReturn = null;
                foreach ($this as $activity) {
                    if (!isset($dtReturn)) {
                        $dtReturn = clone $activity->dtCreated;
                    }

                    if ($activity->dtCreated->getTimestamp() < $dtReturn->getTimestamp()) {
                        $dtReturn = clone $activity->dtCreated;
                    }
                }

                return $dtReturn;
            }

            return DateTime::from("-1 year");
        }

        /**
         * @return DateTime
         */
        public function getDtLast(): DateTime
        {
            if (count($this) > 0) {
                $dtReturn = null;
                foreach ($this as $activity) {
                    if (!isset($dtReturn)) {
                        $dtReturn = clone $activity->dtCreated;
                    }

                    if ($activity->dtCreated->getTimestamp() > $dtReturn->getTimestamp()) {
                        $dtReturn = clone $activity->dtCreated;
                    }
                }

                return $dtReturn;
            }

            return DateTime::from("now");
        }

        /**
         * @param DateTime $from
         * @param DateTime $to
         * @return ActivityList
         */
        public function getSelection(DateTime $from, DateTime $to): ActivityList
        {
            $activityList = new ActivityList();

            foreach ($this as $activity) {
                if ($activity->dtCreated->getTimestamp() >= $from->getTimestamp() &&
                    $activity->dtCreated->getTimestamp() <= $to->getTimestamp()) {
                    $activityList->add($activity);
                }
            }

            return $activityList;
        }
    }
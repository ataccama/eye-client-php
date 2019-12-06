<?php

    namespace Ataccama\Eye\Client\Mappers;

    use Ataccama\Common\Env\Entry;
    use Ataccama\Eye\Client\Env\Activities\Activity;
    use Ataccama\Eye\Client\Env\Activities\Metadata;
    use Ataccama\Eye\Client\Env\Activities\Type;
    use Nette\Utils\DateTime;


    /**
     * Class ActivityMapper
     * @package Ataccama\Eye\Client\Mappers
     */
    final class ActivityMapper extends Mapper
    {
        protected function map($input, &$output)
        {
            $activity = new Activity($input->id, DateTime::from($input->dtCreated), new Entry($input->sessionId),
                new Type($input->type->id, $input->type->name), $input->ipAddress);
            if (!empty($input->country)) {
                $activity->countryCode = $input->country->iso2;
            }

            //foreach ($input->tags as $tag)

            foreach ($input->metadata as $metadata) {
                $activity->metadata->add(new Metadata($metadata->key, $metadata->value));
            }

            $output = $activity;
        }

        public function getObject(): Activity
        {
            return parent::getObject();
        }
    }
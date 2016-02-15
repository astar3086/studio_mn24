<?php
    /**
     * FilterValidator class file.
     *
     * @author    Qiang Xue <qiang.xue@gmail.com>
     * @link      http://www.yiiframework.com/
     * @copyright 2008-2013 Yii Software LLC
     * @license   http://www.yiiframework.com/license/
     */


    /**
     * FilterValidator transforms the data being validated based on a filter.
     *
     * FilterValidator is actually not a validator but a data processor.
     * It invokes the specified filter method to process the attribute value
     * and save the processed value back to the attribute. The filter method
     * must follow the following signature:
     * <pre>
     * function foo($value) {...return $newValue; }
     * </pre>
     * Many PHP 'built in' functions qualify this signature (e.g. trim).
     *
     * To specify the filter method, set {@link filter} property to be the function name.
     *
     * @author  Qiang Xue <qiang.xue@gmail.com>
     * @package system.validators
     * @since   1.0
     */
    class FilterValidator extends \Validator\Validator
    {
        /**
         * @var callback the filter method
         */
        public $filter;

        /**
         * Validates the attribute of the object.
         * If there is any error, the error message is added to the object.
         *
         * @param \Model $object    the object being validated
         * @param string $attribute the attribute being validated
         *
         * @throws \Kohana_Exception if given {@link filter} is not callable
         */
        protected function validateAttribute($object, $attribute)
        {
            if($this->filter === null || !is_callable($this->filter))
            {
                throw new \Kohana_Exception('The "filter" property must be specified with a valid callback.');
            }
            $object->$attribute = call_user_func_array($this->filter, [$object->$attribute]);
        }
    }
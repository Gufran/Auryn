<?php

namespace Auryn;

class StandardReflector implements Reflector {
    public function getClass($class) {
        return new \ReflectionClass($class);
    }

    public function getCtor($class) {
        $reflectionClass = new \ReflectionClass($class);

        return $reflectionClass->getCtor();
    }

    public function getCtorParams($class) {
        return ($reflectedCtor = $this->getCtor($class))
            ? $reflectedCtor->getParameters()
            : NULL;
    }

    public function getParamTypeHint(\ReflectionFunctionAbstract $function, \ReflectionParameter $param) {
        return ($reflectionClass = $param->getClass())
            ? $reflectionClass->getName()
            : NULL;
    }

    public function getFunction($functionName) {
        return new \ReflectionFunction($functionName);
    }

    public function getMethod($classNameOrInstance, $methodName) {
        $className = is_string($classNameOrInstance)
            ? $classNameOrInstance
            : get_class($classNameOrInstance);

        return new \ReflectionMethod($className, $methodName);
    }
}

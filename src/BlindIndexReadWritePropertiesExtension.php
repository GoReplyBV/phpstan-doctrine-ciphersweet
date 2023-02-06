<?php

namespace GoReply\PHPStanDoctrineCiphersweet;

use GoReply\DoctrineCiphersweet\Attribute\BlindIndex;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Rules\Properties\ReadWritePropertiesExtension;

class BlindIndexReadWritePropertiesExtension implements ReadWritePropertiesExtension
{
    public function isAlwaysRead(PropertyReflection $property, string $propertyName): bool
    {
        return false;
    }

    public function isAlwaysWritten(PropertyReflection $property, string $propertyName): bool
    {
        $attributes = $property->getDeclaringClass()
            ->getNativeProperty($propertyName)
            ->getNativeReflection()
            ->getAttributes(BlindIndex::class);

        return count($attributes) > 0;
    }

    public function isInitialized(PropertyReflection $property, string $propertyName): bool
    {
        return false;
    }
}

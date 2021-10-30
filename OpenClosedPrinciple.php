<?php

interface Shape {

    public function area();
}

class Rectangle implements Shape{

    public $width  = 34;
    public $height  = 74;

    public function area()
    {
        return $this->width * $this->height;
    }
}
class Circle implements Shape{

    public $width  = 3;
    public $height  = 7;

    public function area()
    {
        return $this->width * $this->height * pi() ;
    }
}



class OpenClosedPrinciple
{
    public $shapes;

    public function __construct(array $shape)
    {
        $this->shapes = $shape;
    }

    public function calculateArea() {
        $area = 0;
        foreach ($this->shapes as $shape) {
            $area+= $shape->area();
        }
        return $area;
    }

}

$classes = get_declared_classes();

$implementsIModule = [];

foreach($classes as $klass) {
    $reflect = new ReflectionClass($klass);
    if($reflect->implementsInterface('Shape'))
        $implementsIModule[] = new $klass;
}



$object = new OpenClosedPrinciple($implementsIModule);


echo "<pre>";
echo $object->calculateArea();







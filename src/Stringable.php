<?php
namespace Hillel;
class Stringable
{
    protected $value;
    public function __construct(string $value)
    {
        $this->value = $value;
    }
    public function __toString()
    {
        return (string) $this->value;
    }

    public function after(string $search)
    {
        return new static(Str::after($this->value, $search));
    }

    public function upper()
    {
        return new static(Str::upper($this->value));
    }

    public function afterLast(string $search)
    {
        return new static(Str::afterLast($this->value,$search));
    }

    public function append(string $string)
    {
        return new static(Str::append($this->value,$string));
    }
    public function basename($string)
    {
        return new static(Str::basename($this->value,$string));
    }
    public function before(string $string)
    {
        return new static(Str::before($this->value,$string));
    }
    public function beforeLast(string $string)
    {
        return new static(Str::beforeLast($this->value,$string));
    }
    public function camel()
    {
        return new static(Str::camel($this->value));
    }
    public function contains(string $string)
    {
        return new static(Str::contains($this->value,$string));
    }

    public function containsAll(array $templates)
    {
        return new static(Str::containsAll($this->value,$templates));
    }

    public function dirname($count=1)
    {
        return new static(Str::dirname($this->value, $count));
    }

    public function endsWith(string $search)
    {
        return new static(Str::endsWith($this->value,$search));
    }

    public function exactly(string $search)
    {
        return new static(Str::exactly($this->value,$search));
    }
    public function explode(string $devider=' ')
    {
        return Str::explode($this->value,$devider);
    }

    public function finish(string $finish)
    {
        return new static(Str::finish($this->value,$finish));
    }

    public function isEmpty()
    {
        return new static(Str::isEmpty($this->value));
    }
    public function isNotEmpty()
    {
        return new static(Str::isNotEmpty($this->value));
    }

    public function kebab()
    {
        return new static(Str::kebab($this->value));
        //return Str::kebab($this->value);
    }
    public function length()
    {
        return new static(Str::length($this->value));
    }

    public function limit($length)
    {
        return new static(Str::limit($this->value,$length));
    }

    public function lower()
    {
        return new static(Str::lower($this->value));
    }

    public function ltrim($find=" ")
    {
        if ($find===null) $find=" ";
        return new static(Str::ltrim($this->value,$find));
    }

    public function padBoth($count=0, $char=" ")
    {
        if ($char===null) $char=" ";
        return new static(Str::padBoth($this->value, $count, $char));
    }

    public function padLeft($count=0, $char=" ")
    {
        if ($char===null) $char=" ";
        return new static(Str::padLeft($this->value, $count, $char));
    }

    public function padRight($count=0, $char=" ")
    {
        if ($char===null) $char=" ";
        return new static(Str::padRight($this->value, $count, $char));
    }

    public function plural()
    {
        return new static(Inflector::pluralize($this->value));
    }

    public function prepend(string $prepend)
    {
        return new static(Str::prepend($this->value,$prepend));
    }

    public function replace(string $search, string $replace)
    {
        return new static(Str::replace($this->value,$search,$replace));
    }

    public function replaceArray(array $replace)
    {
        return new static(Str::replaceArray($this->value,$replace));
    }

    public function replaceFirst(string $needle, string $replace)
    {
        return new static(Str::replaceFirst($this->value,$needle,$replace));
    }

    public function replaceLast(string $needle, string $replace)
    {
        return new static(Str::replaceLast($this->value,$needle,$replace));
    }

    public function rtrim($find=" ")
    {
        if ($find===null) $find=" ";
        return new static(Str::rtrim($this->value,$find));
    }

    public function singular()
    {
        return new static(Inflector::singularize($this->value));
    }

    public function slug($char="-")
    {
        return new static(Str::slug($this->value,$char));
    }

    public function snake()
    {
        return new static(Str::snake($this->value));
    }

    public function start($start)
    {
        return Str::start($this->value,$start);
    }

    public function startsWith($start)
    {
        return Str::startsWith($this->value,$start);
    }

    public function studly()
    {
        return new static(Str::studly($this->value));
    }

    public function substr(int $start, $length)
    {
        return new static(Str::substr($this->value,$start,$length));
    }

    public function title()
    {
        return new static(Str::title($this->value));
    }

    public function trim($find=null)
    {
        if ($find===null) $find=" ";
        return new static(Str::trim($this->value,$find));
    }

    public function ucfirst()
    {
        return new static(Str::ucfirst($this->value));
    }

    public function when($condition, $func)
    {
        if ($condition)
        {
            return $func(new static($this->value));
        }
        else
        {
            return new static($this->value);
        }
    }

    public function whenEmpty($func)
    {
        if($this->isEmpty())
        {
            return $func(new static($this->value));
        }
        else
        {
            return new static($this->value);
        }
    }

    public function words(int $count, string $ending)
    {
        //return new static(Str::words($this->value,$count, $ending));
        return Str::words($this->value,$count,$ending);
    }
}
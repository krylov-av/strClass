<?php
namespace Hillel;
class Str
{
    public static function of(string $string)
    {
        return new Stringable($string);
    }

    public static function after($subject, $search)
    {
        return $search === ''? $subject : array_reverse(explode($search, $subject, 2))[0];
    }

    public static function upper(string $string)
    {
        return strtoupper($string);
    }

    public static function afterLast(string $subject, string $search)
    {
        //$expl = explode($search,$subject);
        //return end($expl);
        return $search === '' ? $subject : end(explode($search,$subject));
    }

    public static function append(string $string1, string $string2)
    {
        return $string1.$string2;
    }

    public static function basename(string $string, $base)
    {
        $file = self::afterLast($string,'/');
        $name = $base==''? $file : self::before($file,$base);
        return $name;
    }

    public static function before(string $subject, string $search)
    {
        return $search ==='' ? $subject : explode($search,$subject,2)[0];
    }

    public static function beforeLast(string $subject, string $search)
    {
        if ($search==='') return $subject;
        $parts = (explode($search,$subject));
        $last = array_pop($parts);
        return implode($search,$parts);
    }
    public static function camel(string $string)
    {
        $parts = explode("_",$string);
        foreach ($parts as $id=>$part)
        {
            if ($id==0) continue;
            $parts[$id]=ucfirst($part);
        }
        return implode('',$parts);
    }

    public static function contains(string $subject, string $search)
    {
        return $search==='' ? true : count(explode($search,$subject))>1;
        //return count(explode($search,$subject));
    }

    public static function containsAll(string $string, array $templates)
    {
        if (count($templates)==0) return true;
        foreach ($templates as $template)
        {
            if (!self::contains($string, $template)) return false;
        }
        return true;
    }

    public static function dirname(string $string, $count=1)
    {
        for ($i=1; $i<=$count; $i++)
        {
            $string=self::beforeLast($string,'/');
        }
        return $string;
    }

    public static function endsWith(string $string, string $search)
    {
        if ($search=='') return true;
        //$search = preg_quote($search);
        return preg_match('@'.$search.'$@',$string)==1;
    }

    public static function exactly(string $string, string $search)
    {
        return $string==$search;
    }

    public static function explode(string $string, string $devider)
    {
        return explode($devider,$string);
    }

    public static function finish(string $string, string $finish)
    {
        if (self::endsWith($string,$finish))
            return $string;
        else
            return $string.$finish;
    }

    public static function isEmpty(string $string)
    {
        return $string==='';
    }

    public static function isNotEmpty(string $string)
    {
        return $string!=='';
    }

    public static function kebab(string $string)
    {
        $pieces = preg_split('/(?=[A-Z])/',$string);
        foreach ($pieces as $id=>$piece)
        {
            $pieces[$id]=strtolower($piece);
        }
        return implode("-",$pieces);
    }

    public static function length(string $string)
    {
        return mb_strlen($string);
    }

    public static function limit(string $string, $count=null)
    {
        if ($count===null) return $string;
        return mb_substr($string,0,$count)."...";
    }

    public static function lower(string $string)
    {
        return strtolower($string);
    }

    public static function ltrim($string, $find="")
    {
        return ltrim($string,$find);
    }

    public static function padBoth($string, $count, $char=" ")
    {
        return str_pad($string, $count, $char, STR_PAD_BOTH);
    }

    public static function padLeft($string, $count, $char=" ")
    {
        return str_pad($string, $count, $char, STR_PAD_LEFT);
    }

    public static function padRight($string, $count, $char=" ")
    {
        return str_pad($string, $count, $char, STR_PAD_RIGHT);
    }

    public static function prepend(string $string, string $prepend)
    {
        return $prepend.$string;
    }

    public static function replace(string $string, string $search, string $replace)
    {
        return str_replace($search,$replace,$string);
    }

    public static function replaceArray(string $string, array $replace)
    {
        foreach ($replace as $r)
        {
            $string = preg_replace('/(\?)/',$r,$string,1);
        }
        return $string;
    }

    public static function replaceFirst(string $string, string $needle, string $replace)
    {
        return preg_replace('/'.$needle.'/',$replace,$string,1);
    }

    public static function replaceLast(string $string, string $needle, string $replace)
    {
        return strrev(preg_replace(strrev("/$needle/"),strrev($replace),strrev($string),1));
    }

    public static function rtrim($string, $find="")
    {
        return rtrim($string,$find);
    }

    public static function slug(string $string, $char='-')
    {
        $string = str_replace(' ',$char,$string);
        $string = strtolower($string);
        return $string;
    }

    public static function snake(string $string)
    {
        $peaces = preg_split('/(?=[A-Z])/',$string);
        foreach ($peaces as $id=>$piece)
        {
            $peaces[$id]=strtolower($piece);
        }
        return implode("_",$peaces);
    }

    public static function start(string $string, string $start)
    {
        if (mb_strpos($string,$start)===0) return $string;
        return $start.$string;
    }

    public static function startsWith(string $string, string $start)
    {
        return mb_strpos($string,$start)===0;
    }

    public static function studly(string $string)
    {
        $pieces = explode("_",$string);
        foreach ($pieces as $id=>$piece)
        {
            $pieces[$id]=ucfirst($piece);
        }
        return implode('',$pieces);
    }

    public static function substr(string $string, int $start, int $length=null)
    {
        if ($length===null) return substr($string,$start);
        return substr($string, $start, $length);
    }

    public static function title(string $string)
    {
        $peaces = explode(" ",$string);
        foreach($peaces as $id=>$peace)
        {
            $peaces[$id]=ucfirst($peace);
        }
        return implode(" ",$peaces);
    }

    public static function trim(string $string, $find=" ")
    {
        $string = self::ltrim($string,$find);
        $string = self::rtrim($string,$find);
        return $string;
    }

    public static function ucfirst(string $string)
    {
        return ucfirst($string);
    }

    public static function words(string $string, int $count, string $ending)
    {
        $peaces = explode(" ",$string);
        if (count($peaces)<=$count) return $string;
        $result = '';
        for ($i=0; $i<$count; $i++)
        {
            if ($result!='') $result.=' ';
            $result .= $peaces[$i];
        }
        $result.=$ending;
        return $result;
    }
}
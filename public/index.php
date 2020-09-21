<?php
require $_SERVER['PWD'].'/vendor/autoload.php';

//use Hillel\Str;

// 1. add public static function to /src/Str.php
// 2. add public function to /src/Stringable.php

// If you'd like to test some functions, uncomment connected string





print "test functions <i>after</i> & <i>upper</i><br>";
print Hillel\Str::of('some@gmail.com@home')
        ->after('@gm')
        ->upper();
print "<hr>";
//####################################################


//print testing('afterLast','home1@home2@home3@home4','@');
//print testing('append','home1@home2','@home3');
//print testing('basename','/foo/bar/baz.jpg', '.jpg');
//print testing('basename','/foo/bar/baz.jpg');
//print testing('before','home1@home2@home3@home4','@');
//print testing('beforeLast','home1@home2@home3@home4','@');
//print testing('camel','foo_bar_baz');
//print testing('contains','This is my name','my');
//print testing('containsAll','This is my name',['is','miy']);
//print testing('dirname','/foo/bar/baz');
//print testing('dirname','/foo/bar/baz',2);
//print testing('endsWith','This is my name','name');
//print testing('endsWith','This is my name','my');
//print testing('exactly','Laravel',"Laravel");//1
//print testing('exactly','Laravel',"laravel");//0
//print testing('explode','foo bar baz',' ');
//print testing('finish','this/string','/');
//print testing('finish','this/string/','/');
//print testing('isEmpty','');
//print testing('isEmpty','Laravel');
//print testing('isNotEmpty','');
//print testing('isNotEmpty','Laravel');
//print testing('kebab','fooBarBaz');
//print testing('length','Laravel-Ларавел');
//print testing('limit','The quick brown fox jumps over the lazy dog',20);
//print testing('lower','LaRaVeL');
//print testing('ltrim','        Laravel        ');
//print testing('ltrim','/Laravel/','/');

//print testing('padBoth','James', 20,'_');
//print testing('padBoth','Мария', 20);
//print testing('padBoth','Roy', 20,'-+=');

//print testing('padLeft','James', 20,'_');
//print testing('padLeft','Мария', 20);
//print testing('padLeft','Roy', 20,'-+=');

//print testing('padRight','James', 20,'_');
//print testing('padRight','Мария', 20);
//print testing('padRight','Roy', 20,'-+=');

#print "<pre>";
#print Hillel\Str::of('James')->padLeft(20,"_")."<br>";
#print Hillel\Str::of('Roy')->padLeft(20,"-+=")."<br>";
#print "</pre>";

#################################################
#echo Hillel\Inflector::pluralize('search');
#echo Hillel\Inflector::pluralize('query');

//print testing('plural','search');
//print testing('plural','query');

//print Hillel\Str::of('query')->plural()->upper();
#################################################

//print testing('prepend','Framework','Laravel ');
//print testing('replace',"Laravel 7.x","7.x","8.x");
//print testing('replaceArray','The event will take place between ? and ?',["8:30","9:00"]);

//print testing('replaceFirst',"the quick brown fox jumps over the lazy dog","the","a");
//print testing('replaceLast',"the quick brown fox jumps over the lazy dog","the","a");

//print testing('rtrim','        Laravel        ');
//print testing('rtrim','/Laravel/','/');

//print testing('singular','searches');
//print testing('singular','queries');

//print testing('slug',"Laravel Framework","-");

//print testing('snake',"fooBar");

//print testing('start', "this/string", "/");
//print testing('start', "/this/string", "/");

//print testing('startsWith',"this/starting","/");
//print testing('startsWith',"/this/starting","/");

//print testing('studly','foo_bar_baz');

//print testing('substr',"Laravel Framework",8);
//print testing('substr',"Laravel Framework",8,5);

//print testing('title',"a nice title uses the correct case");

//print testing('trim','        Laravel        ');
//print testing('trim','/Laravel/','/');

//print testing('ucfirst','foo bar baz');


// Cool test!
//$string = \Hillel\Str::of('Taylor')
//   ->when(true, function ($string) {
//        return $string->append(' Otwell');
//    })
//    ->upper()
//    ->padBoth(40,"-+=");
//print "'".$string."'";


//Next Cool!
//$string = \Hillel\Str::of('    ')
//     ->whenEmpty(function ($string) {
//         return $string->trim()->prepend('Laravel');
//     });
//print "'".$string."'";

//
//$string = \Hillel\Str::of('Perfectly balanced, as all things should be.')->words(3, ' >>>');
//print "'".$string."'";











function testing($function,$var1='',$var2=null,$var3=null)
{
    $out = "test function <i>".$function."</i><br>";
    $out.= "\Hillel\Str::of('".$var1."')<br>";
    $out.= "->".$function."(";

    switch (gettype($var2))
    {
        case 'string':
            $out.="'".$var2."'";
            break;
        case 'array':
            $out.='[';
            $out_array='';
            foreach ($var2 as $item)
            {
                $out_array.= ($out_array=='')?'':',';
                $out_array.="'".$item."'";
            }
            $out.=$out_array.']';
            break;
        case 'integer':
            $out.=$var2;
            break;
        case 'NULL':
            break;
        default:
            $out.='var2 is unknown "'. gettype($var2).'"';
            break;
    }
    ###########################################
    switch (gettype($var3))
    {
        case 'string':
            $out.=", '".$var3."'";
            break;
        case 'NULL':
            break;
        case 'integer':
            $out.=', '.$var3;
            break;
        default:
            $out.=', var3 is unknown "'.gettype($var3).'"';
            break;
    }
    $out.=');<br>';
    $out.="<b>Result:</b>";
    $result = \Hillel\Str::of($var1)->$function($var2,$var3);
    switch (gettype($result))
    {
        case 'NULL':
            $out.='<i>null</i>';
            break;
        case 'string':
        case 'boolean':
        case 'object':
            $out.="'".$result."'";
            $out.='<pre>"'.$result.'"</pre>';
            break;
        case 'integer':
            $out.=$result;
            break;
        case 'array':
            $out.='[';
            $out_array='';
            foreach ($result as $item)
            {
                $out_array.= ($out_array=='')?'':',';
                $out_array.="'".$item."'";
            }
            $out.=$out_array.']';
            break;
        default:
            $out.='Error! Result has unknown type: '.gettype($result);
            break;
    }
    $out.= "<hr>";
    return $out;
}
?>
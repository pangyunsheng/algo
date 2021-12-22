<?php
/**
 * 递归优化
 * 斐波那契数列问题（兔子问题）
 * 1，1，2，3，5，8，。。。。。。
 * Created by PhpStorm.
 * User: PYS
 * CreateTime: 2021-12-22 14:02:56
 */
namespace Algo_10;

require_once '../vendor/autoload.php';

// 递归问题
function fun($n){
    if($n==1 || $n==2){
        return 1;
    }

    return fun($n-1) + fun($n-2);
}

// 1. 递归方式的优化
$a = $b = 1;
function recursion($n, $a, $b)
{
    if($n >= 3){
        return recursion($n-1, $a+$b, $a);
    }

    return $a;
}

// 2. 非递归方式优化
function nonRecursion($n)
{
    if($n === 1 || $n === 2){
        return 1;
    }

    $a = $b = 1;
    for ($i = 3; $i <= $n; $i++){
        $temp = $b;
        $b += $a;
        $a = $temp;
    }

    return $b;
}

// test
$n = 20;

$a = $b = 1;
print_r(recursion($n, $a, $b));

echo PHP_EOL;

print_r(nonRecursion($n));

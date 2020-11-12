<?php

// Напишите код (функцию, класс), которая проверяет простое число или нет
// На вход - число, выход - да/нет

function is_prime ($n){
    $res = false;
    for($x=2; $x < $n; $x++) {
        if($n % $x == 0) {
            $res = true;
        }
    }
    if($res == false) {echo 'да';} else {echo 'нет';};
}


is_prime(2707);
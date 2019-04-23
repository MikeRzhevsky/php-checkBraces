
<?php

namespace MikeR;

class CheckBraces
{
    public static function main($str)
    {
        $bracket_map =  [ '[' => ']', '{' => '}', '(' => ')' ]; //создаем массив скобок
        $bracket_map_flipped = array_flip($bracket_map); //меняем местами ключи с значениями для проверки вхождения пары
        $length = strlen($str); //получаем длину строки
        $brackets_stack = []; //инициализируем массив для работы
        for ($i = 0; $i < $length; $i++) { //пробегаем по всей строке
            $current_char = $str[$i]; // получаем текущий символ строки
            if (isset($bracket_map[$current_char])) { //проверяем вхождение символа в массиве
                $brackets_stack[] = $bracket_map[$current_char]; // вставляем в массив
            } else if (isset($bracket_map_flipped[$current_char])) { //проверяем на наличие пары в массиве текущего символа
                $expected = array_pop($brackets_stack);//возвращаем последний элемент массива
                if (($expected === NULL) || ($current_char != $expected)) { //если пара не найдена или символ не соответствет начальному
                    return 1;//возвращаем ошибку
                }
            }
        }
        return 0; //проверка прошла успешно
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ДЗ №5 'String'</title>
</head>
<body>
<pre>
<?php 
ini_set('default_charset','utf-8');
ini_set("display_errors", "1");
error_reporting(E_ALL);

/*Работа с регистром символов
1. Дана строка 'Привет, мир!'. Сделайте из нее строку 'ПРИВЕТ МИР!'.*/
$s='Привет, мир!';
$s=mb_strtoupper($s);
echo $s;

/*2. Дана строка 'PHP'. Сделайте из нее строку 'php'.*/
$s1='PHP';
$s1=mb_strtolower($s1);
echo $s1;

/*3. Дана строка 'москва'. Сделайте из нее строку 'Москва'.*/
$s2 = 'moscow';
$s2 = ucfirst($s2);
echo $s2;

/*4. Дана строка 'МОСКВА'. Сделайте из нее строку 'Москва'.*/
$s3='MOSCOW';
$s3=mb_strtolower($s3);
$s3=ucfirst($s3);
echo $s3;

/*5. Дана строка 'иванов иван иванович'. Сделайте из нее строку 'Иванов Иван Иванович'.*/
$s4='ivanov ivan ivanovich';
$s4=ucwords($s4);
echo $s4;

/*Работа с strlen, substr
6. Дана строка 'я учу PHP!'. Найдите количество символов в этой строке.*/
$s5='я учу PHP!';
echo strlen($s5);

/*7. Дана строка 'я учу PHP!'. Вырежьте из нее слово 'учу' и слово 'PHP'.*/
$s6='I learning PHP!';
$uchu=substr($s6,2,8);
echo $uchu, "<br/>";
$php=substr($s6,11,3);
echo $php;

/*8. Дана переменная $str, в которой хранится какой-либо текст. Реализуйте обрезание длинного текста по следующему принципу: если количество символов этого текста больше заданного в переменной $n, то в переменную $result запишем первые $n символов строки $str и добавим в конец многоточие '...'. В противном случае в переменную $result запишем содержимое переменной $str.*/
$n=6;
$result='';
$str='He was happy because, he start learning php!';
echo ($n<strlen($str)) ?  $result=substr($str,0,$n).'...' : $result=$str; 

/*9. Напишите функцию, которая генерирует пароль. Функция должна принимать параметр. Параметр должен задавать количество символов в пароле.*/
$n1=4;
$password='';
function pass($n1) {
$char="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP$&!"; 
$password='';
$len=strlen($char)-1;
	while ($n1--) {
		$password.=$char{rand(0,$len)};
	}
	return $password;
}
$password=pass($n1);
echo $password;

/*10. Создайте переменную $password. Присвойте переменной $password результат функции из предыдущего примера. Если количество символов пароля больше 5-ти и меньше 10-ти, то выведите пользователю сообщение о том, что пароль подходит, иначе сообщение о том, что нужно придумать другой пароль.*/
echo (strlen($password)>5 && strlen($password)<10) ? ' Норм пароль' : ' Придумайте другой';

/*11. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно столько рядов, чтобы последний элемент пирамидки состоял из одного символа. Первый ряд пирамиды должен хранится в переменной $str (может иметь различное количество символов). Подсказка: воспользуйтесь функциями strlen и substr.
xxxxxxxxxx
xxxxxxxxx
xxxxxxxx
xxxxxxx
xxxxxx*/
$str1='xxxxxxxxxxx';
$len1=strlen($str1)-1;
while ($len1 >= 0) {
	echo $str1,"<br/>";
	$str1=substr($str1,0,$len1);
	$len1--;
}

/*Работа с str_replace
12. Дана строка 'Я-учу-PHP!'. Замените все дефисы на тег '<br>'.*/
$str2='Я-учу-PHP!';
$str2=str_replace("-","<br/>",$str2);
echo $str2;

/*13. Дана строка '31.12.2013'. Замените все точки на дефисы.*/
$str3='31.12.2013';
$str3=str_replace('.','-',$str3);
echo $str3;

/*14. Дана строка $str. Замените смайлики ':)', ':(', '^-^', которые встречаются в этой строке на соответсвующие картинки (<img src=''>).*/
$arr=[':)', ':(', '^-^'];
$arr1=["<img src='' alt='1'>","<img src='' alt='2'>","<img src='' alt='3'>"];
$str4='Dfhgdfgdhf :) fdfjdfkj :( drfhjfdhdj ^-^';
$str4=str_replace($arr,$arr1,$str4);
echo $str4;

/*15. Дана переменная $str, в которой хранится строка русского текста. Напишите скрипт, который запишет транслит этого текста в переменную $translit. Напишите также скрипт, который выполнит обратную операцию.*/
$str5 = 'Абра кадабра';
	$ru = array(
		'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й',
		'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф',
		'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
		'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й',
		'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф',
		'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
	);

	$en = array(
		'A', 'B', 'V', 'G', 'D', 'E', 'IO', 'ZH', 'Z', 'I', 'I',
		'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F',
		'H', 'C', 'CH', 'SH', 'SH', '`', 'Y', '`', 'E', 'IU', 'IA',
		'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'i',
		'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
		'h', 'c', 'ch', 'sh', 'sh', '`', 'y', '`', 'e', 'iu', 'ia'
	);
     $translit=str_replace($ru, $en, $str5);
	echo $translit;

/*Работа с explode, implode
16. Дана строка 'я учу PHP!'. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива.*/
$str6='я учу PHP!';
$arr2=explode(' ',$str6);
var_dump($arr2); 

/*17. Дан массив с элементами 'html', 'css', 'php', 'js'. С помощью функции implode создайте строку из этих элементов, разделенных запятыми.*/
$arr3=['html', 'css', 'php', 'js'];
$result1='';
$result1=implode(',',$arr3);
echo $result1;

/*18. В переменной $date лежит дата в формате '2013-12-31'. Преобразуйте эту дату в формат '31.12.2013'.*/
$date = '2013-12-31';
$arr4 = explode('-', $date);
echo $arr4[2].'.'.$arr4[1].'.'.$arr4[0];

/*19. В переменной $date лежит дата в формате '31.12.2013'. Преобразуйте эту дату в формат '2013-12-31'.*/
$date1 = '31.12.2013';
	$arr5 = explode('.',$date1);
	echo $arr5[2].'-'.$arr5[1].'-'.$arr5[0];

/*Работа с trim, ltrim, rtrim
20. Дана строка ' php '. Сделайте из нее 3 разных строки с помощью функций класса trim: 'php', ' php', 'php '.*/
$str7 = ' php ';
	echo trim($str7).'<br>';
	echo rtrim($str7).'<br>';
	echo ltrim($str7);

/*Работа с strip_tags и htmlspecialchars
21. Дана строка 'html, <b>php</b>, js'. Удалите теги из этой строки.*/
echo strip_tags('html, <b>php</b>, js');

/*22. Дана строка 'html, <b>php</b>, js'. Выведите ее на экран 'как есть': то есть браузер не должен преобразовать <b> в жирный.*/
echo htmlspecialchars('html, <b>php</b>, js');

/*Работа с chr и ord
23. Узнайте код символов 'a', 'b', 'c', пробела.*/
echo ord('a');
echo ord('b');
echo ord('c');
echo ord(' ');

/*24. Изучите таблицу ASCII. Определите границы, в которых располагаются буквы английского алфавита. Выведите на экран символ с кодом 33.*/
echo chr(33);

/*25. Запишите в переменную $str случайный символ — большую букву латинского алфавита. Подсказка: с помощью таблицы ASCII определите какие целые числа соответствуют большим буквам латинского алфавита.*/
$str8 = chr(rand(65, 90));
	echo $str8;

/*26. Запишите в переменную $str случайную строку $len длиной, состоящую из маленьких букв латинского алфавита. Подсказка: воспользуйтесь циклом for или while.*/
$str9 = '';
	$lena = 15;
	for ($i = 1; $i <= $lena; $i++)
	{
		$str9 .= chr(rand(97, 122));
	}
	echo $str9;

/*Работа с substr_count, str_word_count, str_split
27. Дана строка 'Мама мыла раму'. Узнайте количество букв 'a' и 'м', входящих в эту строку.*/
$str10 = 'Мама мыла раму';
	echo substr_count($str10, 'м').'<br>';
	echo substr_count($str10, 'а');

/*28. Скопируйте весь текст со страницы php.su, запишите его в переменную $str. Подсчитайте количество символов и количество слов в даннной строке.*/
$str11 = ' PHP для начинающих и продвинутых веб-программистов
Уроки PHP. На основе дискуссий форума PHP.SU.
Вы начинаете изучать PHP? Ознакомьтесь с вводным курсом обучения PHP.
Так же для новичков наши профессионалы собрали материалы по форуму PHP.SU и разместили это в виде Уроков PHP.
Знаете основы PHP и хотите укрепить свои познания? 
Обратитесь непосредственно к разделу "Изучение PHP". 
Рекомендуем также ознакомиться с принципами работы PHP с протоколом HTTP.
Вам также потребуется справочник по всем функциям PHP, полностью на русском. 
Справочник по функциям PHP оснащен системой поиска функций по ключевым словам.
В PHP есть обширные средства для работы с СУБД, такими, как MySQL. 
Вы можете использовать PHP для работы с большим количеством различных типов СУБД.
Наш портал содержит множество статей по PHP, MySQL, Apache, PEAR, регулярным выражениям, XML, другим веб-технологиям. 
Общее число статей на данный момент составляет более 250.
У нас Вы найдете большое количество учебников и справочников по PHP, MySQL, HTML, XML, JavaScript и.т.д.
Для того, чтобы заниматься разработкой PHP скриптов и их отладкой, Вам необходим интерпретатор PHP, а также веб-сервер, например, Apache. 
Если Вы будете создавать скрипты с использованием баз данных, то хорошим выбором будет MySQL.
Если Вы уже достаточно продвинутый пользователь и хотите самостоятельно установить и сконфигурировать веб-сервер, PHP и MySQL, то Вам в помощь раздел "Подготовка к работе".
Раздел "PHP скрипты" поможет Вам скачать большое количество различных скриптов PHP.
Раздел "Download" поможет Вам скачать необходимые компоненты: PHP, Apache, MySQL, PECL, PEAR, редакторы PHP кода, полезные утилиты для PHP и документацию по PHP, MySQL, PEAR и Apache.';
	echo str_word_count($str11).'<br>';
	echo mb_strlen($str11);

/*29. Создайте массив гласных букв. С помощью этого массива подсчитайте количество гласных в строке $str. Результат представьте в виде ассоциативного массива, где ключами будут буквы, а элементами их количество.*/
$str12='Тру ля ля';
	$lett=array('А','Е','Ё','И','Й','О','У','Ы','Э','Ю','Я','а','е','ё','и','й','о','у','ы','э','ю','я');
	$arr5=[];
	foreach ($lett as $letter3)
	{
		$arr5[$letter3]=substr_count($str12, $letter3);
	}
print_r($arr5);

/*30. Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'.*/
$str='1234567890';
var_dump(str_split($str, 2));

/*Работа с str_repeat, strrev
31. Проверьте, является ли пара слов палиндромом (одинаково читается во всех направлениях, кот-ток, нос-сон).*/
$str = 'cot-toc';
	$rev = strrev($str);
	 echo ($rev == $str) ? 'Yes' : 'No';

/*32. Дан массив $arr. Найдите в нем все пары слов-палиндромов (одинаково читаются во всех направлениях, кот-ток, нос-сон). Результат выводите в виде строка формата 'нос — сон'. Проверьте работу скрипта на массиве $arr из примера. Совет: нужно сделать не один, а два цикла.*/
$arr = array('slon', 'nos', 'tok', 'tak', 'kot', 'pir', 'mir','son', 'rim');
$str='';
$boof1='';
$boof='';
foreach ($arr as $key => $value) {
	foreach ($arr as $key1 => $value1) {
			$boof=strrev($value1);
		if ($boof==$value) {$str.=$value1.'-'.$value."<br/>";
			unset($arr[$key1]);
			unset($arr[$key]);
		}
	}
}
echo $str;

/*33. Определите является ли фраза палиндромом. Примеры: 'A roza upala na lapu Asora'. Обратите внимание на то, что при обратном чтении игнорируются пробелы, запятые, дефисы, тире и большие буквы (подсказка: значит сначала нужно привести строку к стандартному виду — удалить лишние символы, привести все к нижнему регистру).*/
$str = 'A roza upala na lapu Asora';
	$str = str_replace([',','.','-','!','?',' '],'',$str);
	$str = strtolower($str);
		echo ($str == strrev($str)) ? 'Yes' : 'No';

/*34. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9 рядов, а не 5. Решите задачу с помощью одного цикла и функции str_repeat.

x
xx
xxx
xxxx
xxxxx*/
$str='x';
for ($i = 1; $i <= 9; $i++)
	{
		echo str_repeat($str , $i).'<br>';
	}

/*35. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9 рядов, а не 5. Решите задачу с помощью одного цикла и функции str_repeat.

1
22
333
4444
55555*/
for ($i = 1; $i <= 9; $i++)
	{
		echo str_repeat($i , $i).'<br>';
	}
?>	
<pre/>
</body>
</html>
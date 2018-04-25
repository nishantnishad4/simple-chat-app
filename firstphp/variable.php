<?php
echo "hello world".'<br>';
$nishant=26;
echo"$nishant <br>" ;
$nishant=($nishant*10);
$nishad="surname";
echo"$nishad,$nishant<br>";
//echo""26*10=",$nishant <br>";
echo"'hello nishant'<br>" ;
$google ="google link <br>";
echo "'your no. is ='.$nishant .' out of 300' <br>";
echo '<a href="http://google.com">'.$google.'</a>';
echo'"hello world"'.'<br>';
echo 'it\'s nice day'. '<br>';
$number1=100;
$number2=100;
echo "add".'<br>';
echo $number1+$number2.'<br>';
echo "subtract".'<br>';
echo $number1-$number2.'<br>';
echo 'divide'.'<br>';
echo $number1/$number2.'<br>';
echo "mul".'<br>';
echo $number1*$number2.'<br>';
$num1=10;
$num2=20;
if($num1==$num2)
{
	echo "the numbers are equal";
	}
else if($num1>$num2){
	echo "number 1 is greater";

}
else if($num2>$num1){
	echo "number2 is greater".'<br>';
}
else
{
	echo" not equals".'<br>';
}
$num2='10';
$num3=10;
if($num2<>$num3){    //as<>=!=
echo"equals";}
	else{
		echo"not equals".'<br>';
	}
	if($num2!==$num3){//not equal to as well as to check type
echo" not equals".'<br>';}
	else{
		echo"equals".'<br>';
	}

	$num4=10;
	$num5=20;
	if(($num4&&$num5))
	{
		echo"not equals".'<br>';
	}
	else{
		echo  " not equals".'<br>';
	}
	$names=array('nishant'=>60,'kumar'=>20, 'nishad');$names[3]='balister'.'<br>';
	echo $names[3].'<br>';
	print_r($names).'<br>';
	echo 'the weight of nishant='.$names['nishant'].'<br>';
	$students=array(array('Name'=>'nishant',20,60),
	array('Name'=>'sachin','age'=>21,60),
	array('Name'=>'sachin kumar',20,65));
    echo $students[0]['Name'].'   ';echo$students[1]['age'].'   '.'<br>';
	for($nishant=1;$nishant<=10;$nishant++)
		echo "hello world <br>";
	$nishant=array('Nishant','Kumar','Nishad');
	foreach($nishant as $nishu)
	{echo $nishu .'   ';
	}
	$students=array(array('Name'=>'nishant',20,60),
	array('Name'=>'sachin','age'=>21,60),
	array('Name'=>'sachin kumar',20,65));
	foreach($students as $student=>$innerarray)
	{
        echo   "$student <br>";
		foreach(   $innerarray as $actual_values){
			echo"$actual_values<br>";
		}
		
	}
	$hello='Nishant';
	switch($hello)
	{
		case 'Nishant':
		echo "ur name is Nishant kumar Nishad<br>";
		
    }
     echo 'Name'. $_GET[stu_name].'<br>';
	 echo'age'.$_GET_[stu_age].'<br>';
	  echo'weight'.$_GET[stu_weight].'<br>';
?>
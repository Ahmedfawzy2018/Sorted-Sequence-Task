<?php

// As the task required : 
// You’re given a sorted sequence of integers from 1 to N (elements do not repeat), then one of the elements is being removed and the sequence is randomly shuffled. Write a program to find the missing element as fast as possible.

function getMissing($givenArr)
{
	$newArr = simple_quick_sort($givenArr) ;
	$ArrCount = count($givenArr) ;

	if($newArr[0] != 1){
		return 1;
	}

	if($newArr[$ArrCount - 1]  != ($ArrCount+1) ){
		return $ArrCount;
	}

	for($i=1;$i<$ArrCount-1;$i++)
	{
		if($newArr[$i] != ($i+1) )
			return $i+1 ;
	}

	return -1 ;

}


function simple_quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(simple_quick_sort($left), array($pivot), simple_quick_sort($right));
    }
}

//print_r(getMissing([5, 3,  6, 1, 4])) ;
?>
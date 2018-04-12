<?php
header("Content-Type:text/html;charset=utf8");
	function pro($arr,$num,$main_id) {
		if(empty($arr)){
			return false;
		}else{
			$new = array();
    foreach($arr as $v){
        $new[$v['1']][] = $v;
    }
    $i = 0; //prarent_id
    $j = 0; //level
    $a = true;
    $p[$i] = 0;
    $q[$j] = $i;
    while($a){
        $next = false;
        $i = $q[$j];
        $var = $new[$i];
        if(!isset($p[$i])){
            $p[$i] = 0;
        }
        if($p[$i] == count($var)){
            echo '</ul>';
        }else{
            for($k=$p[$i]; $k<count($var);$k++){
                if($k == 0)
                    echo '<ul>';
                	$id=$var[$k]['0'];
                echo '<li>'.$var[$k]['4']."<form method='post' action='?p=back&c=Act&a=Reply&id=$num&parent_id=$id&level=$j&main_id=$main_id'><input type='text' name='message'><input type='submit' value='回复'></form>";
                
                $p[$i]++;
                if(isset($new[$var[$k]['0']])){
                    $i = $var[$k]['0'];
                    $j++;
                    $q[$j] = $i;
                    $next = true;
                    break;
                }
                echo '</li>';
                if($k == count($var)-1){
                    echo '</ul>';
                }
            }
        }
        if($next){
            continue;
        }
        $j--;
        if($j < 0){
            break;
        }
    }
	 return true;
		}
	}

    function tpro($arr,$num,$main_id) {
        if(empty($arr)){
            return false;
        }else{
            $new = array();
    foreach($arr as $v){
        $new[$v['1']][] = $v;
    }
    $i = 0; //prarent_id
    $j = 0; //level
    $a = true;
    $p[$i] = 0;
    $q[$j] = $i;
    while($a){
        $next = false;
        $i = $q[$j];
        $var = $new[$i];
        if(!isset($p[$i])){
            $p[$i] = 0;
        }
        if($p[$i] == count($var)){
            echo '</ul>';
        }else{
            for($k=$p[$i]; $k<count($var);$k++){
                if($k == 0)
                    echo '<ul>';
                    $id=$var[$k]['0'];
                echo '<li>'.$var[$k]['4']."<form method='post' action='?p=back&c=TShow&a=Reply&id=$num&parent_id=$id&level=$j&main_id=$main_id'><input type='text' name='message'><input type='submit' value='回复'></form>";
                
                $p[$i]++;
                if(isset($new[$var[$k]['0']])){
                    $i = $var[$k]['0'];
                    $j++;
                    $q[$j] = $i;
                    $next = true;
                    break;
                }
                echo '</li>';
                if($k == count($var)-1){
                    echo '</ul>';
                }
            }
        }
        if($next){
            continue;
        }
        $j--;
        if($j < 0){
            break;
        }
    }
     return true;
        }
    }
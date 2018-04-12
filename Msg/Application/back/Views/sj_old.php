<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<script src="jquery/jquery-3.2.1.js"></script>
<link href="css/reply.css" rel="stylesheet" type="text/css"> </link>
<body>
    <?php
//header("Content-Type:text/html;charset=utf8");
  function pro($arr,$num,$main_id) {
        //$arr _reply的输出数组
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
    $form = 0;
    echo '<div class="tex">';
    ?> 
    
    <?php
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
                $form++;
                if($k == 0)
                    echo '<ul>';
                  $id=$var[$k]['0'];
                    
                echo '<script type="text/javascript">
                        $(document).ready(function(){
                          $("pp'.$form.'").click(function(){
                            $("form_'.$form.' form").fadeIn(60);
                          });
                        });

                        $(document).ready(function(){
                          $(" hh'.$form.' input").click(function(){
                            $("form_'.$form.' form").fadeIn(60);
                          });
                        });
                        </script>';
                echo "<li>".'<img src="image/3.jpg">'."<pp".$form."><p> ". $var[$k]['3'].'回复'. $var[$k]['7'].':'.'</p><p>'.$var[$k]['4'].'</p></pp'.$form.'>';
                echo "<form_".$form.">"."<form method='post' action='?p=back&c=Act&a=Reply&parent_id=$id&level=$j&main_id=$main_id'>"."<hh".$form.">"."<input class='text1' type='text' name='message'>"."</hh".$form.">"."<div class='pinglun'><input type='submit' value='回复'></div>"."</form>"."</form_".$form.">"."<br/><br/><br/><br/>";
                
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
    }echo '</div>';
   return true;
    }
  }
    function tpro($arr,$num,$main_id) {
        //$arr _reply的输出数组
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
    $form = 0;
    echo '<div class="tex">';
    ?> 
    
    <?php
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
                $form++;
                if($k == 0)
                    echo '<ul>';
                  $id=$var[$k]['0'];
                    
                echo '<script type="text/javascript">
                        $(document).ready(function(){
                          $("pp'.$form.'").click(function(){
                            $("form_'.$form.' form").fadeIn(60);
                          });
                        });

                        $(document).ready(function(){
                          $(" hh'.$form.' input").click(function(){
                            $("form_'.$form.' form").fadeIn(60);
                          });
                        });
                        </script>';
                echo "<li>".'<img src="image/3.jpg">'."<pp".$form."><p> ". $var[$k]['3'].'回复'. $var[$k]['7'].':'.'</p><p>'.$var[$k]['4'].'</p></pp'.$form.'>';
                echo "<form_".$form.">"."<form method='post' action='?p=back&c=TShow&a=Reply&parent_id=$id&level=$j&main_id=$main_id>"."<hh".$form.">"."<input class='text1' type='text' name='message'>"."</hh".$form.">"."<div class='pinglun'><input type='submit' value='回复'></div>"."</form>"."</form_".$form.">"."<br/><br/><br/><br/>";
                
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
    }echo '</div>';
   return true;
    }
  }

?>
</body>
</html>
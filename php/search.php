<?php
/**
 * Created by PhpStorm.
 * User: run
 * Date: 2019/1/2
 * Time: 0:01
 */

$keyword = $_POST['key'];
//$opt = $_POST['opt'];
//$keyword = 'dog';
//$opt = 'att2in';

//$opt = "topdown";
//$command = 'java -jar captionSearch.jar';
//$command = $command.' '.'"'.$keyword.'"'.' '.'"'.$opt.'"'.' 100';
//#echo $command;
//exec($command,$res);
//#var_dump($res);
//#var_dump($res);
//echo $res[0];
$res = getImage($keyword);
echo json_encode($res);
function getImage($query){
    //var_dump($query);
    //$myfile = fopen("res.txt", "r") or die("Unable to open file!");
    $query_key = explode(' ',$query);
    //var_dump($query_key);
    $pool["good"]=0;
    foreach ($query_key as $key){

        //echo "keyword_is".$key;
        //$myfile = fopen("index/".$key, "r") or die("Unable to open file!");
        $myfile = file_get_contents("index/".$key.'.txt');
        $myfile = str_replace('\r\n','',$myfile);
        //$line = explode(' ',$myfile);

        //var_dump($line);
        foreach (explode(' ',$myfile) as $word){
            if($word)
            if (array_key_exists($word,$pool)){
                $pool[$word]=$pool[$word]+1;
            }else{
                $pool[$word] = 1;
            }
            //echo $word;
        }
        $sort_pool = arsort($pool);
        $sort_pool_key = array_keys($pool);
        $sort_pool_key = array($sort_pool_key);
        //echo $sort_pool_key;
//        foreach ($pool as $k=>$v){
//            echo "key".$k;
//        }
        //var_dump($pool);

        //var_dump($result);
        //echo $sort_pool;

    }
    for ($i=1;$i<=26;$i++){
        next($pool);
        $key = key($pool);
        if($key!=null){
            //echo "key:".$key;
			$ip="192.168.139.1";
			//$ip="10.173.40.80";
			$local_ip = "localhost";
            $image_path = 'http://'.$ip.'/image_caption/test2014/COCO_test2014_'.$key.'.jpg';
            $result[$i]['image_path']=$image_path;

        }
        //http://localhost/image_caption/test2014/COCO_test2014_000000231985.jpg
    }
    //var_dump($pool);
    return $result;
    //var_dump($pool);
//    while(!feof($myfile)) {
//        $line = fgets($myfile);
//        $key = $line.explode("\t",$line)[0];
//        $value = $line.explode("\t",$line)[1];
//        $values = $value.explode(",",$value);
//        echo $value;
//        echo $values;
//        echo fgets($myfile) . "<br>";
//    }
//    fclose($myfile);
}


//
//
//<?php
///**
// * Created by PhpStorm.
// * User: run
// * Date: 2019/1/2
// * Time: 0:01
// */
//
//$keyword = $_POST['key'];
//$opt = $_POST['opt'];
////$keyword = 'dog';
////$opt = 'att2in';
//
////$opt = "topdown";
////$command = 'java -jar captionSearch.jar';
////$command = $command.' '.'"'.$keyword.'"'.' '.'"'.$opt.'"'.' 100';
////#echo $command;
////exec($command,$res);
////#var_dump($res);
////#var_dump($res);
////echo $res[0];
//if($opt=="mapreduce"){
//    $res = getImage($keyword);
//    echo json_encode($res);
//}else{
//    $opt = 'topdown';
//    $command = 'java -jar captionSearch.jar';
//    $command = $command.' '.'"'.$keyword.'"'.' '.'"'.$opt.'"'.' 100';
//#echo $command;
//    exec($command,$res);
//#var_dump($res);
//#var_dump($res);
////    $result = json_decode($res[0]);
////    var_dump($result);
////    var_dump($result[0]["caption"]);
//    //echo $result.get(0)['image_path'];
////    foreach ($result as $key=>$value){
////
////    }
//    echo $res[0];
//}
//
//function getImage($query){
//    //var_dump($query);
//    //$myfile = fopen("res.txt", "r") or die("Unable to open file!");
//    $query_key = explode(' ',$query);
//    //var_dump($query_key);
//    $pool["good"]=0;
//    foreach ($query_key as $key){
//
//        //echo "keyword_is".$key;
//        //$myfile = fopen("index/".$key, "r") or die("Unable to open file!");
//        $myfile = file_get_contents("index/".$key.'.txt');
//        $myfile = str_replace('\r\n','',$myfile);
//        //$line = explode(' ',$myfile);
//
//        //var_dump($line);
//        foreach (explode(' ',$myfile) as $word){
//            if($word)
//                if (array_key_exists($word,$pool)){
//                    $pool[$word]=$pool[$word]+1;
//                }else{
//                    $pool[$word] = 1;
//                }
//            //echo $word;
//        }
//        $sort_pool = arsort($pool);
//        $sort_pool_key = array_keys($pool);
//        $sort_pool_key = array($sort_pool_key);
//        //echo $sort_pool_key;
////        foreach ($pool as $k=>$v){
////            echo "key".$k;
////        }
//        //var_dump($pool);
//
//        //var_dump($result);
//        //echo $sort_pool;
//
//    }
//    for ($i=1;$i<=26;$i++){
//        next($pool);
//        $key = key($pool);
//        if($key!=null){
//            //echo "key:".$key;
//            $image_path = 'http://10.173.156.127/image_caption/test2014/COCO_test2014_'.$key.'.jpg';
//            $result[$i]['image_path']=$image_path;
//
//        }
//        //http://localhost/image_caption/test2014/COCO_test2014_000000231985.jpg
//    }
//    //var_dump($pool);
//    return $result;
//    //var_dump($pool);
////    while(!feof($myfile)) {
////        $line = fgets($myfile);
////        $key = $line.explode("\t",$line)[0];
////        $value = $line.explode("\t",$line)[1];
////        $values = $value.explode(",",$value);
////        echo $value;
////        echo $values;
////        echo fgets($myfile) . "<br>";
////    }
////    fclose($myfile);
//}
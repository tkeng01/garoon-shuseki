<pre>
  <?php
  $head = array("名前", "全体会議", "宴会");
  $data = array($_POST["garoon_user"], $_POST["kaigi"], $_POST["enkai"]);

  if(($csv = fopen("shuseki.csv", "r")) == NULL) {
    $csv = fopen("shuseki.csv", "a");
    fputcsv($csv, $head);
    fputcsv($csv, $data);
  } else {
    $check = fopen("shuseki.csv","r");
    $col = 0;
    $newarray = array();
    while ($list = fgetcsv($check)) {
      for ($line = 0; $line < count($list); $line++){
        $newarray[$col][$line] = $list[$line];
      }
      $col++;
    }
    fclose($check);

    for($i = 0; $i < count($newarray); $i++){
      for($y = 0; $y < count($newarray[$i]); $y++){
        echo $newarray[$i][$y];
        echo ' ';
      }
    }

    $arynew = array();
    for($i = 0; $i < count($newarray); $i++){
      if($newarray[$i][0] == $data[0]){
        array_push($arynew, $data);
      } else {
        array_push($arynew, $newarray[$i]);
      }
    }

    $flag = 0;
    for($i = 0; $i < count($newarray); $i++){
      if($newarray[$i][0] == $data[0]){
        $flag++;
      }
    }
    if($flag == 0) {
      array_push($arynew, $data);
    }

    for($i = 0; $i < count($arynew); $i++){
      for($y = 0; $y < count($arynew[$i]); $y++){
        echo $arynew[$i][$y];
        echo ' ';
      }
    }

    $csv = fopen("shuseki.csv", "w");
    for($i = 0; $i < count($arynew); $i++){
      fputcsv($csv, $arynew[$i]);
    }
  }
  fclose($csv);
  ?>
</pre>

<link rel="stylesheet" href="static/index.css">
<div class="block"></div>
<?php
$today = date("Y/m/d");

echo "<h1 class='title'><span class='title_color'>今日は、</span>{$today}</h1>";
echo "<h2> 西暦を入力すると和暦に変換されます</h2>";

?>

<form name="form" action="koyomi.php" method="get">
    <input maxlength="4" type="tel" name="year"  class="text_field">
    <input type="submit" value="確認" class="submit_button">
    <h2>下の西暦をクリックしても和暦に変換されます</h2>
    <div class="href_block">
    </div>
    <?php
    #1926~2090年までを表示したい
    for ($i = 1926; $i < 2025; $i++){
                            #リンク先year=を変数iに置き換えて、クリックされたらリンクの数値をURLに代入する。
        echo "<div class='inline'><a href='http://localhost:63342/Koyomi/Koyomi_Cal/koyomi.php?year={$i}' javascript:form.submit()><h5> {$i}年 </h5></a></div>";
    }

    ?>
</form>
<div class="end"></div>
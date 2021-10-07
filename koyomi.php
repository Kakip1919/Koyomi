<link rel="stylesheet" href="static/index.css">
<div class="block"></div>
<div>
    <?php
    ini_set('display_errors', 0);
    #PHPの開発環境構築と簡単な記載ルールの勉強に2時間程費やしました。
    #PHPStormをIDEとして選びましてCLIパスにMAMPからphp.exeをパス指定して構築しました。

    #提示していただいたサイトがなかなか見つからず15分程費やしました。(見つからず他サイトで代用しました　(https://www.benricho.org/nenrei/sei-wa-conv.html))　合計 2:15時間
    #暦の理解と計算ロジック考案に1時間程費やしました。 暦の計算式を記載してくれているサイトがありましたので、それを元にロジックを考えました(https://gendai.ismedia.jp/articles/-/59139)　合計 3:15時間
    #計算ロジックの修正、テストに２時間３０分費やしました。　どうしても計算が合わず、長考しつつ和暦の表を見返すと元年から２年に移り変わっていて　元年を１として数えてなかったために合わなかったようです。　合計 5:45時間
    #元年を０として計算しているため、元年以外には１を足しています。
    #入力された値から何年後か何年前かを計算するプログラムを作ろうと思いましたがコードが複雑になってきて現時点で管理が難しそうなので先送りにします
    #軽くデザインを整えてgitに上げて終了です 1時間程度　　合計 6:45時間

    #phpを書くのは今回が初めてですが、発見が多くとても楽しくコードを書くことができました
    #以上です
    #追加修正、現在時間、西暦リンク先追加
    #昭和から平成ブロック

    $koyomi = $_GET["year"];
    $subtitle = $_GET["year"];
    if(isset($koyomi)){
        if($koyomi >= 2099 || $koyomi <= 1925){

            echo "<h1 class='error'>入力された数値がおかしいです<p>半角数字で1926年から2098年までの数値で入力してください</p></h1>";
        }
    }

    if($koyomi >= 1926 && $koyomi <= 1999) {

        if (substr($koyomi, -2) >= 89) {
            $koyomi -= 89;
            $wareki = substr($koyomi, -2);

            if($wareki == 1){

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>平成{$wareki}年です</h1>";
            }
            elseif($wareki == 0){

                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>平成元年です</h1>";
            }
            else {

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>平成{$wareki}年です</h1>";
            }
        }

        elseif (substr($koyomi, -2) <= 88) {

            $koyomi -= 26;
            $wareki = substr($koyomi, -2);

            if($wareki == 1){

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>昭和{$wareki}年です</h1>";
            }
            elseif($wareki == 0){

                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>昭和元年です</h1>";
            }
            else {

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>昭和{$wareki}年です</h1>";
            }
        }
    }

    #平成から令和ブロック
    if($koyomi >= 2000 && $koyomi < 2099) {

        if (substr($koyomi, -2) <= 18) {

            $koyomi += 12;
            $wareki = substr($koyomi, -2);
            echo "<h1 class='subtitle'>{$subtitle}年は、";
            echo "<h1>平成{$wareki}年です</h1>";

        }
        elseif (substr($koyomi, -2) >= 18) {
            $koyomi -= 19;
            $wareki = substr($koyomi, -2);
            if($wareki == 1){

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>令和{$wareki}年です</h1>";
            }
            elseif($wareki == 0){

                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>令和元年です</h1>";
            }
            else {

                $wareki += 1;
                echo "<h1 class='subtitle'>{$subtitle}年は、";
                echo "<h1>令和{$wareki}年です</h1>";
            }
        }
    }

    ?>
</div>

    <form action="koyomi.php" method="get">
        <input maxlength="4" type="tel" name="year"  class="text_field">
        <input type="submit" value="確認" class="submit_button">
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




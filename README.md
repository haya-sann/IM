# IM
かわごえ里山の田んぼに置いた観測機器から取得したデータを一覧表示させるプログラム。
Raspberry Piで取得した気温、湿度、気圧、土壌温度、照度に加え、今年からは水田を満たす水深を計測する。

INTER-Mediatorを使ったシステム。データ投入のためのAPIを作ってそこにRaspberry Piから直接データを投げ込む。

毎年の登熟温度を集計し､問合せ日までの一覧表を表示するようにした（2022/11/12）

phpは7系列を使っている。現在の実行環境は
PHP 7.1.33 (cli) (built: May 31 2022 10:39:39) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.1.33, Copyright (c) 1999-2018, by Zend Technologies

/usr/local/php/7.1/bin/php

<?php
return array(



    'hanteiLimit' => [
        '1' => '-',
        '2' => '1/8 Final',
        '3' => '1/4 Final',
        '4' => '1/2 Final',
        '5' => 'Final',
    ],
//    'gender' => [
//        '1' => '-',
//        '2' => 'M',
//        '3' => 'F',
//    ],

    'preliminaryGroupSize' => [3 => 3, 4 => 4, 5 => 5],
    'preliminaryWinner' => [1 => 1], // , 2 => 2, 3 => 3
    'enchoQty' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'teamSize' => [2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
    'teamReserve' => [1 => 1, 2 => 2, 3 => 3, 4 => 4],
    'limitByEntity' => [0 => '-', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],


    'default_settings' => [
        'fightingAreas' => '1',
        'fightDuration' => '05:00',
        'hasPreliminary' => '1',
        'preliminaryGroupSize' => '3',
        'preliminaryDuration' => '05:00',
        'preliminaryWinner' => '1',
        'hasEncho' => '1',
        'enchoQty' => '1',
        'enchoDuration' => '0',
        'hasHantei' => '0',
        'hanteiLimit' => '0', // 1/2 Finals
        'enchoGoldPoint' => '0', // Step where Encho has no more time limit
        'limitByEntity' => '4',
        'cost' => '',
        'treeType' => '1',
        'seedQuantity' => '4',

    ],

    'MIN_COMPETITORS_X_AREA' => 2,
    // Tournament Levels
    'ND' => 1,
    'local' => 2,
    'district' => 3,
    'city' => 4,
    'state' => 5,
    'regional' => 6,
    'national' => 7,
    'international' => 8,


    'PLAY_OFF' => 0,
    'DIRECT_ELIMINATION' => 1,


);
?>
<?php

// Напишите код (на PHP) выдающий массив данных: 
// - Должник: id, тип, имя
// - Список лотов: по каждому - номер, стоимость, описание.


if (file_exists('test.xml')) {
    $xml = simplexml_load_file('test.xml');
} else {
    exit('Не удалось открыть файл test.xml.');
}

$lots = $xml->MessageInfo->Auction->LotTable->AuctionLot;
$debitor = $xml->BankruptInfo->BankruptPerson;

$data = [
    'debtor' => [
        'id' => $debitor->attributes()->Id,
        'type' => $debitor->attributes()->InsolventCategoryName,
        'name' => $debitor->NameHistory->NameHistoryItem
    ],
    'lots' => [
        
    ]
];

foreach ($lots as $lot){
    array_push ($data['lots'], [
        'number' => $lot->Order,
        'price' => $lot->StartPrice,
        'description' => $lot->Description
    ]) ;
}


var_dump($data);
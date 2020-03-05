<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=burgers", 'root', 'i9c8ip3k');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

function getData($db, $query)
{
    $ret = $db->query($query);
    if (!$ret) {
        echo 'ERROR';
        print_r($db->errorInfo());
        die;
    }
    return $retEmail = $ret->fetchAll(PDO::FETCH_ASSOC);
}


$users = getData($pdo, "SELECT * FROM burgers.users;");
$orders = getData($pdo, "SELECT * FROM burgers.orders;");

function random_color_part()
{
    return str_pad(dechex(mt_rand(0, 90)), 2, '0', STR_PAD_LEFT);
}

function random_color()
{
    return random_color_part() . random_color_part() . random_color_part();
}

?>


<h2>Admin panel</h2>

<ul style="padding: 0; list-style: none;display: inline-block;">
    <? foreach ($users as $user) { ?>
        <li>
            <ul style="color: <?= random_color() ?>">
                <? foreach ($user as $key => $item) { ?>
                    <li>
                        <?= $key . ": " . $item ?>
                    </li>
                <? } ?></ul>
            <hr>
        </li>
    <? } ?>
</ul>
<ul style="padding: 0; list-style: none;display: inline-block;">
    <? foreach ($orders as $order) { ?>
        <li>
            <ul style="color: <?= random_color() ?>">
                <? foreach ($order as $key => $item) { ?>
                    <li>
                        <?= $key . ": " . $item ?>
                    </li>
                <? } ?></ul>
            <hr>
        </li>
    <? } ?>
</ul>

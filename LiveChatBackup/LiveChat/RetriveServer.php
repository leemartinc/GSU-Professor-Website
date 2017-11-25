<?php
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Email\To;
use Ddeboer\Imap\Search\Text\Body;
use Ddeboer\Imap\Server;

$server= new Server('imap.gmail.com');

$connection = $server->authenticate('house941217@gmail.com','qifanerB123.');


$mailbox = $connection->getMailbox('INBOX');

$search = new SearchExpression();
$search->addCondition(new From('6786873967@mms.cricketwireless.net'));
$search->addCondition(new Body('contents'));

$messages = $mailbox->getMessages($search);


echo $messages;



?>
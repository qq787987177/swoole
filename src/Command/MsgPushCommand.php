<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Swoole\WebSocketClient;

class MsgPushCommand extends Command
{
    protected static $defaultName = 'msg:push';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $host   = '127.0.0.1';
        $prot   = 9501;
        $client = new WebSocketClient($host, $prot);
        $client->connect();

        $client->send("aaaa");
        $recvData = "";
//获取发送的消息 不获取会由于连接中断，服务器无法发送消息报错
        $tmp      = $client->recv();
        if (!empty($tmp)) {
            $recvData .= $tmp->data;
        }
        echo "data" . $recvData . "size:" . strlen($recvData) . PHP_EOL;

        echo PHP_EOL . "======" . PHP_EOL;
        sleep(1);
        echo 'finish' . PHP_EOL;

    }
}

<?php

require 'ExpenseTracker.php';

$tracker = new ExpenseTracker();

$command = $argv[1] ?? null;
switch ($command) {
    case 'add':
        $description = $argv[3] ?? 'No Description';
        $amount = (float) ($argv[5] ?? 0);
        echo $tracker->addExpense($description, $amount) . PHP_EOL;
        break;

    case 'delete':
        $id = (int) ($argv[3] ?? 0);
        echo $tracker->deleteExpense($id) . PHP_EOL;
        break;

    case 'list':
        echo $tracker->listExpenses() . PHP_EOL;
        break;

    case 'summary':
        $month = !empty($argv[3]) ? (int) $argv[3] : null;
        echo $tracker->summary($month) . PHP_EOL;
        break;

    default:
        echo "Invalid command. Use 'add', 'delete', 'list', or 'summary'." . PHP_EOL;
        break;
}
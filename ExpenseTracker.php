<?php

class ExpenseTracker {
    private $expenses = [];
    private $nextId = 1;

    public function addExpense($description, $amount) {
        $this->expenses[$this->nextId] = [
            'id' => $this->nextId,
            'date' =>('Y-m-d'),
            'description' => $description,
            'amount' => $amount,
        ];
        $this->nextId++;
        return "Expense added successfully (ID: {$this->nextId})"; 
    }

    public function deleteExpense($id) {
        if(isset($this->expenses[$id])) {
            unset($this->expenses[$id]);
            return "Expense deleted successfully";
        }
        return "Expense not found";
    }  public function listExpenses() {
        if (empty($this->expenses)) {
            return "No expenses recorded.";
        }

        $output = "ID  Date       Description  Amount\n";
        foreach ($this->expenses as $expense) {
            $output .= "{$expense['id']}   {$expense['date']}  {$expense['description']}  \${$expense['amount']}\n";
        }
        return $output;
    }

    public function summary($month = null) {
        $total = 0;
        foreach ($this->expenses as $expense) {
            if ($month === null || date('n', strtotime($expense['date'])) == $month) {
                $total += $expense['amount'];
            }
        }
        return $month 
            ? "Total expenses for month {$month}: \${$total}" 
            : "Total expenses: \${$total}";
    }


 

}
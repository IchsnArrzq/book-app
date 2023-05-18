<?php

namespace App\View\Components\Loan;

use App\Models\Book;
use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $member;
    public $book;
    /**
     * Create a new component instance.
     */
    public function __construct(Book $book, Member $member)
    {
        $this->book = $book;
        $this->member = $member;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loan.form');
    }
}

<?php

declare(strict_types=1);

class PageController extends Controller
{
    public function home(): void
    {
        $this->render('pages/home');
    }
}

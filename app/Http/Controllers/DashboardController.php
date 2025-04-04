<?php

namespace App\Http\Controllers;

use Coderflex\LaravelTicket\Models\Ticket;

class DashboardController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke()
    {
        $totalTickets = Ticket::count();
        $openTickets = Ticket::opened()->count();
        $closedTickets = Ticket::closed()->count();

        return view('dashboard', compact('totalTickets', 'openTickets', 'closedTickets'));
    }
}
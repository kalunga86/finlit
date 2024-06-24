<?php
 
namespace App\View\Composers;

use Illuminate\View\View;
 
class NotificationComposer
{
    /**
     * Create a new notification composer.
     */
    public function __construct() {
        // 
    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $notifications = auth()->user()->notifications;
        $view->with('notifications', $notifications);
    }
}
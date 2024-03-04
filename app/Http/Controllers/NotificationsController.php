<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\ChangeCourtStaff;
use App\Models\event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function getNotificationsData(Request $request)
    {
        // For the sake of simplicity, assume we have a variable called
        // $notifications with the unread notifications. Each notification
        // have the next properties:
        // icon: An icon for the notification.
        // text: A text for the notification.
        // time: The time since notification was created on the server.
        // At next, we define a hardcoded variable with the explained format,
        // but you can assume this data comes from a database query.
        $user = User::findOrFail(Auth::user()->id);
        $courtChangeRequest = ChangeCourtStaff::getRequests();
        $AssignedCases = CaseModel::getMyActiveCases($user);
        $AssignedCaseEvents = event::getMyActiveCaseEvent($user);
        $notifications = [
            [
                'icon' => 'fas fa-fw fa-users text-primary',
                'text' => $courtChangeRequest . ' staff change requests',
                'time' => rand(0, 60) . ' minutes',
                'link' => 'admin.change_court_staff',
                'can' => $user->can('change-court-staff-approve'),
                'countt' => $courtChangeRequest,
            ],
            [
                'icon' => 'fas fa-fw fa-file text-danger',
                'text' => $AssignedCases . ' active cases',
                'time' => rand(0, 60) . ' minutes',
                'can' => $user->can('case-list'),
                'link' => '/case',
                'countt' => $AssignedCases,
            ],
            [
                'icon' => 'fas fa-fw fa-file text-info',
                'text' => $AssignedCases . ' case schedules',
                'time' => rand(0, 60) . ' minutes',
                'can' => $user->can('case-list'),
                'link' => '/case',
                'countt' => $AssignedCaseEvents,
            ],
        ];

        // Now, we create the notification dropdown main content.

        $dropdownHtml = '';
        $nCount = 0;

        foreach ($notifications as $key => $not) {
            if (!$not['can'] | ($not['countt'] == 0)) {
                continue;
            }
            $icon = "<i class='mr-2 {$not['icon']}'></i>";

            $time = "<span class='float-right text-muted text-sm'>
                   {$not['time']}
                 </span>";

            $dropdownHtml .= "<a href='{$not['link']}' class='dropdown-item'>
                            {$icon}{$not['text']}{$time}
                          </a>";

            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }

            $nCount++;
        }

        // Return the new notification data.

        return [
            'label' => $nCount,
            'label_color' => 'danger',
            'icon_color' => 'dark',
            'dropdown' => $dropdownHtml,
        ];
    }
}

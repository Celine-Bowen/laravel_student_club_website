<?php

return [
  'sections' => [
    'event' => 'Event',
    'course' => 'Course',
    'project' => 'Project',
    'story' => 'Story'
  ],

  'stories' => [
    'publish' => 'Publish',
    'draft' => 'Draft',
    'archive' => 'Archive'
  ],

  'workshops' => [
    'status' => [
      'ongoing' => 'EventScheduled',
      'cancelled' => 'EventCancelled',
      'postponed' => 'EventPostponed',
      'past' => 'EventScheduled',
    ],
    'mode' => [
      'online' => 'OnlineEventAttendanceMode',
      'online_multiple' => 'OnlineEventAttendanceMode',
      'offline' => 'OfflineEventAttendanceMode',
      'offline_multiple' => 'OfflineEventAttendanceMode',
    ]
  ],
];
